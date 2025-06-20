<?php
class ERC20Helper {
    private $pdo;
    private $hyperSyncUrl;
    private $hyperSyncToken;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->hyperSyncUrl = 'https://base.hypersync.xyz';
        $this->hyperSyncToken = '5bfe0eec-2309-4fb2-8543-9eb2ea4ea4df';
    }

    public function getMetadata($contractAddress) {
        $cacheKey = "erc20_metadata_" . strtolower($contractAddress);
        $cached = $this->getFromCache($cacheKey);
        if ($cached) return $cached;

        try {
            // Try database first
            $stmt = $this->pdo->prepare("
                SELECT name, symbol, decimals 
                FROM tokens 
                WHERE LOWER(contract_address) = LOWER(:address)
            ");
            $stmt->execute([':address' => $contractAddress]);
            $dbData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dbData) {
                $this->saveToCache($cacheKey, $dbData, 86400);
                return $dbData;
            }

            // Fallback to HyperSync
            $data = $this->queryHyperSync([
                "from_block" => 0,
                "logs" => [
                    [
                        "address" => [$contractAddress],
                        "topics" => [
                            ["0xddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef"] // Transfer
                        ]
                    ]
                ],
                "field_selection" => ["log" => ["data", "topics"]]
            ]);

            $metadata = [
                'name' => 'Unknown',
                'symbol' => 'UNKN',
                'decimals' => 18
            ];

            // Parse transfer events to confirm it's a valid token
            if (!empty($data['data']['logs'])) {
                // If we get here, it's at least a valid contract with transfers
                $metadata = $this->getContractMetadata($contractAddress);
            }

            $this->saveToCache($cacheKey, $metadata, 3600);
            return $metadata;

        } catch (Exception $e) {
            error_log("ERC20 metadata error: " . $e->getMessage());
            return [
                'name' => 'Unknown',
                'symbol' => 'UNKN',
                'decimals' => 18
            ];
        }
    }

    private function getContractMetadata($contractAddress) {
        // Try to get name/symbol/decimals via HyperSync
        $result = [
            'name' => 'Unknown',
            'symbol' => 'UNKN',
            'decimals' => 18
        ];

        // In production, you'd add actual contract calls here
        return $result;
    }

    private function queryHyperSync($query) {
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $this->hyperSyncToken
                ],
                'content' => json_encode(["query" => $query])
            ]
        ]);

        $response = file_get_contents($this->hyperSyncUrl . '/query', false, $context);
        return json_decode($response, true);
    }

    private function getFromCache($key) {
        $stmt = $this->pdo->prepare("
            SELECT data FROM cache WHERE `key` = :key AND expires_at > NOW()
        ");
        $stmt->execute([':key' => $key]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? json_decode($row['data'], true) : false;
    }

    private function saveToCache($key, $data, $ttl) {
        $this->pdo->prepare("
            INSERT INTO cache (`key`, data, expires_at)
            VALUES (:key, :data, DATE_ADD(NOW(), INTERVAL :ttl SECOND))
            ON DUPLICATE KEY UPDATE data = VALUES(data), expires_at = VALUES(expires_at)
        ")->execute([
            ':key' => $key,
            ':data' => json_encode($data),
            ':ttl' => $ttl
        ]);
    }
}