<?php
// 1. STRICT ACCESS CONTROL
define('POPULATE_ACCESS_KEY', 'DIGPEG123');
if (!isset($_GET['direct_key']) || $_GET['direct_key'] !== POPULATE_ACCESS_KEY) {
    header('Content-Type: application/json');
    http_response_code(403);
    die(json_encode(["error" => "Unauthorized access"]));
}

// 2. ISOLATE FROM ROUTER
$_SERVER['REQUEST_URI'] = '/populate_tokens_direct';
ini_set('display_errors', 0);
error_reporting(0);

// 3. NEW HYPER SYNC CLIENT
require __DIR__ . '/index.php';

class HyperSyncClient {
    const BASE_URL = 'https://base.hypersync.xyz';
    const TIMEOUT = 15;

    public static function query($query) {
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => implode("\r\n", [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . HYPERSYNC_TOKEN,
                    'Accept: application/json'
                ]),
                'content' => json_encode($query),
                'timeout' => self::TIMEOUT,
                'ignore_errors' => true
            ]
        ]);

        $response = file_get_contents(self::BASE_URL . '/query', false, $context);
        
        if ($response === false) {
            throw new Exception("Connection to HyperSync failed");
        }

        $data = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("Raw HyperSync Response: " . $response);
            throw new Exception("Invalid HyperSync response format");
        }

        return $data;
    }
}

// 4. MAIN EXECUTION
try {
    ob_start();
    
    $query = [
        "query" => [
            "from_block" => 0,
            "logs" => [
                [
                    "topics" => [
                        ["0xddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef"]
                    ]
                ]
            ],
            "field_selection" => [
                "log" => ["address"]
            ],
            "max_num_transactions" => 50 // Reduced for stability
        ]
    ];

    $data = HyperSyncClient::query($query);
    
    if (!isset($data['data']['logs'])) {
        throw new Exception("No token data received from HyperSync");
    }

    // 5. DATABASE OPERATION
    $pdo->beginTransaction();
    $inserted = 0;
    
    $stmt = $pdo->prepare("
        INSERT INTO tokens 
        (network_id, contract_address, name, symbol, decimals) 
        VALUES 
        (3, :address, CONCAT('Token_', SUBSTRING(:address, 1, 6)), 'TKN', 18)
        ON DUPLICATE KEY UPDATE last_updated=NOW()
    ");

    foreach ($data['data']['logs'] as $log) {
        if (empty($log['address'])) continue;
        
        $address = strtolower($log['address']);
        if (!preg_match('/^0x[a-f0-9]{40}$/', $address)) continue;
        
        try {
            $stmt->execute([':address' => $address]);
            $inserted++;
        } catch (PDOException $e) {
            error_log("DB Error: " . $e->getMessage());
        }
    }
    
    $pdo->commit();

    // 6. CLEAN OUTPUT
    ob_end_clean();
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'inserted' => $inserted,
        'total_processed' => count($data['data']['logs'])
    ]);

} catch (Exception $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    
    ob_end_clean();
    header('Content-Type: application/json');
    http_response_code(500);
    
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage(),
        'suggestion' => 'Check HyperSync API status at https://status.hypersync.xyz'
    ]);
}