<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

// Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'digpegex_digpegdb');
define('DB_USER', 'digpegex_wp343');
define('DB_PASS', 'tx-7]{AEgQ&8');
define('HYPERSYNC_URL', 'https://base.hypersync.xyz');
define('HYPERSYNC_TOKEN', '5bfe0eec-2309-4fb2-8543-9eb2ea4ea4df');
define('CACHE_TTL', 3600);
define('CACHE_DIR', __DIR__ . '/cache/');

// Create cache directory if not exists
if (!file_exists(CACHE_DIR)) {
    mkdir(CACHE_DIR, 0755, true);
}

// Database Connection
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Initialize helpers
    require_once __DIR__ . '/ERC20Helper.php';
    $erc20 = new ERC20Helper($pdo);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}

// Get the requested endpoint
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$endpoint = $_GET['endpoint'] ?? '';
$endpoint = rtrim($endpoint, '/');
if (empty($endpoint)) $endpoint = '/';

switch ($endpoint) {
    case '/':
        echo json_encode([
            'success' => true,
            'api' => 'DigPeg Token Verification',
            'endpoints' => [
                '/networks' => 'GET - List all networks',
                '/tokens' => 'GET - List all tokens',
                '/tokens/{network}' => 'GET - Filter by network',
                '/verify?token=SYMBOL&network=NETWORK' => 'GET - Verify token',
                '/report' => 'GET - Verification report'
            ]
        ]);
        break;

    case '/networks':
        handleNetworksEndpoint();
        break;

    case '/tokens':
        handleTokensEndpoint();
        break;

    case '/verify':
        handleVerifyEndpoint();
        break;

    case '/report':
        handleReportEndpoint();
        break;

    default:
        if (preg_match('#^/tokens/(.+)$#', $endpoint, $matches)) {
            handleTokensByNetworkEndpoint($matches[1]);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo json_encode([
                'success' => false,
                'error' => 'Endpoint not found',
                'requested' => $endpoint,
                'try_these' => [
                    '/networks',
                    '/tokens',
                    '/verify?token=ETH&network=ethereum'
                ]
            ]);
        }
}

function handleNetworksEndpoint() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM networks");
        $networks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode([
            'success' => true,
            'data' => array_map('formatNetwork', $networks),
            'timestamp' => date('c')
        ]);
    } catch(PDOException $e) {
        sendDatabaseError($e);
    }
}

function handleTokensEndpoint() {
    global $pdo;
    try {
        $stmt = $pdo->query("
            SELECT t.*, n.name as network_name, n.symbol as network_symbol, n.slug as network_slug 
            FROM tokens t JOIN networks n ON t.network_id = n.id
        ");
        echo json_encode([
            'success' => true,
            'data' => array_map('formatToken', $stmt->fetchAll(PDO::FETCH_ASSOC)),
            'timestamp' => date('c')
        ]);
    } catch(PDOException $e) {
        sendDatabaseError($e);
    }
}

function handleTokensByNetworkEndpoint($networkIdentifier) {
    global $pdo;
    try {
        $networkId = getNetworkId($networkIdentifier);
        if (!$networkId) {
            echo json_encode(['success' => false, 'error' => 'Network not found']);
            return;
        }
        $stmt = $pdo->prepare("
            SELECT t.*, n.name as network_name, n.symbol as network_symbol, n.slug as network_slug
            FROM tokens t JOIN networks n ON t.network_id = n.id
            WHERE t.network_id = :network_id
        ");
        $stmt->execute([':network_id' => $networkId]);
        echo json_encode([
            'success' => true,
            'data' => array_map('formatToken', $stmt->fetchAll(PDO::FETCH_ASSOC)),
            'timestamp' => date('c')
        ]);
    } catch(PDOException $e) {
        sendDatabaseError($e);
    }
}

function handleVerifyEndpoint() {
    global $erc20;
    
    $tokenInput = $_GET['token'] ?? null;
    $networkInput = $_GET['network'] ?? null;
    $contractAddress = $_GET['contract'] ?? null;

    if ((!$tokenInput && !$contractAddress) || !$networkInput) {
        echo json_encode(['success' => false, 'error' => 'Token/contract and network parameters are required']);
        return;
    }

    try {
        $networkId = getNetworkId($networkInput);
        if (!$networkId) {
            echo json_encode(['success' => false, 'error' => 'Network not found']);
            return;
        }

        $token = $contractAddress 
            ? getTokenByContract($contractAddress, $networkId)
            : getTokenByIdentifier($tokenInput, $networkId);
        
        if (!$token) {
            echo json_encode(['success' => false, 'error' => 'Token not found']);
            return;
        }

        // Refresh metadata before verification
        $metadata = $erc20->getMetadata($token['contract_address']);
        if ($metadata) {
            $token['name'] = $metadata['name'] ?? $token['name'];
            $token['symbol'] = $metadata['symbol'] ?? $token['symbol'];
            $token['decimals'] = $metadata['decimals'] ?? $token['decimals'];
        }

        $verification = verifyTokenComprehensive($token);
        echo json_encode([
            'success' => true,
            'data' => [
                'token' => formatToken($token),
                'verification' => $verification,
                'timestamp' => date('c')
            ]
        ]);
    } catch(PDOException $e) {
        sendDatabaseError($e);
    } catch(Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}

function handleReportEndpoint() {
    global $pdo;
    try {
        $stmt = $pdo->query("
            SELECT t.id, t.name, t.symbol, t.contract_address, t.verification_status,
                   n.name as network_name, n.symbol as network_symbol,
                   t.last_verified_at
            FROM tokens t JOIN networks n ON t.network_id = n.id
            ORDER BY t.last_verified_at DESC LIMIT 100
        ");
        echo json_encode([
            'success' => true,
            'data' => array_map('formatReportItem', $stmt->fetchAll(PDO::FETCH_ASSOC)),
            'timestamp' => date('c')
        ]);
    } catch(PDOException $e) {
        sendDatabaseError($e);
    }
}

function getNetworkId($networkInput) {
    global $pdo;
    if (is_numeric($networkInput)) {
        return (int)$networkInput;
    }
    $stmt = $pdo->prepare("SELECT id FROM networks WHERE LOWER(name) = LOWER(:name) OR LOWER(slug) = LOWER(:name)");
    $stmt->execute([':name' => $networkInput]);
    $network = $stmt->fetch(PDO::FETCH_ASSOC);
    return $network ? $network['id'] : null;
}

function getTokenByIdentifier($tokenInput, $networkId) {
    global $pdo;
    if (is_numeric($tokenInput)) {
        $stmt = $pdo->prepare("
            SELECT t.*, n.name as network_name, n.symbol as network_symbol, n.slug as network_slug
            FROM tokens t JOIN networks n ON t.network_id = n.id
            WHERE t.id = :token_id AND t.network_id = :network_id
        ");
        $stmt->execute([':token_id' => (int)$tokenInput, ':network_id' => $networkId]);
    } else {
        $stmt = $pdo->prepare("
            SELECT t.*, n.name as network_name, n.symbol as network_symbol, n.slug as network_slug
            FROM tokens t JOIN networks n ON t.network_id = n.id
            WHERE (LOWER(t.symbol) = LOWER(:symbol) OR (LOWER(t.contract_address) = LOWER(:symbol))
            AND t.network_id = :network_id
        ");
        $stmt->execute([':symbol' => $tokenInput, ':network_id' => $networkId]);
    }
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getTokenByContract($contractAddress, $networkId) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT t.*, n.name as network_name, n.symbol as network_symbol, n.slug as network_slug
        FROM tokens t JOIN networks n ON t.network_id = n.id
        WHERE LOWER(t.contract_address) = LOWER(:contract) AND t.network_id = :network_id
    ");
    $stmt->execute([':contract' => $contractAddress, ':network_id' => $networkId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function verifyTokenComprehensive($token) {
    global $erc20;
    $cacheKey = "verification_{$token['contract_address']}_{$token['network_id']}";
    $cachedData = getFromCache($cacheKey);
    if ($cachedData) {
        return $cachedData;
    }

    $network = getNetworkById($token['network_id']);
    $verification = [
        'basic_information' => verifyBasicInformation($token, $network),
        'source_code' => verifySourceCode($token, $network),
        'ownership_control' => verifyOwnershipControl($token, $network),
        'tokenomics' => verifyTokenomics($token, $network),
        'liquidity_markets' => verifyLiquidityMarkets($token, $network),
        'holders_distribution' => verifyHoldersDistribution($token, $network),
        'security_audit' => verifySecurityAudit($token, $network),
        'compliance_legal' => verifyComplianceLegal($token, $network),
        'community_presence' => verifyCommunityPresence($token, $network),
        'ecosystem_use_cases' => verifyEcosystemUseCases($token, $network)
    ];

    $overallScore = calculateOverallScore($verification);
    $result = [
        'categories' => $verification,
        'overall_score' => $overallScore,
        'overall_status' => getStatusFromScore($overallScore),
        'last_verified' => date('c')
    ];

    saveToCache($cacheKey, $result, CACHE_TTL);
    return $result;
}

function verifyBasicInformation($token, $network) {
    $checks = [
        'token_name_valid' => !empty($token['name']),
        'contract_address_valid' => isValidAddress($token['contract_address']),
        'blockchain_correct' => true,
        'contract_creation_date_valid' => !empty($token['creation_date']),
        'creator_address_valid' => isValidAddress($token['creator_address']),
        'symbol_valid' => !empty($token['symbol']),
        'decimals_valid' => is_numeric($token['decimals']),
        'max_supply_consistent' => verifyTokenSupply($token, 'max_supply'),
        'total_supply_consistent' => verifyTokenSupply($token, 'total_supply'),
        'circulating_supply_consistent' => verifyTokenSupply($token, 'circulating_supply')
    ];
    return buildVerificationResult($checks, 15);
}

function verifySourceCode($token, $network) {
    $sourceCode = getContractSourceCode($token['contract_address'], $network['symbol']);
    $checks = [
        'source_code_verified' => $sourceCode['verified'] ?? false,
        'license_type_present' => !empty($sourceCode['license']),
        'upgradeable_contract' => containsUpgradePattern($sourceCode['source'] ?? ''),
        'proxy_pattern_used' => containsProxyPattern($sourceCode['source'] ?? ''),
        'admin_functions_present' => containsAdminFunctions($sourceCode['source'] ?? ''),
        'mint_function_present' => containsMintFunction($sourceCode['source'] ?? ''),
        'burn_function_present' => containsBurnFunction($sourceCode['source'] ?? ''),
        'pause_function_present' => containsPauseFunction($sourceCode['source'] ?? ''),
        'blacklist_features' => containsBlacklist($sourceCode['source'] ?? ''),
        'self_destruct_present' => containsSelfDestruct($sourceCode['source'] ?? '')
    ];
    return buildVerificationResult($checks, 20);
}

function verifyOwnershipControl($token, $network) {
    $ownerAddress = getContractOwner($token['contract_address'], $network['symbol']);
    $isRenounced = $ownerAddress === '0x0000000000000000000000000000000000000000';
    $checks = [
        'ownership_renounced' => $isRenounced,
        'current_owner_valid' => isValidAddress($ownerAddress),
        'multi_sig_governance' => isMultiSigWallet($ownerAddress, $network['symbol']),
        'governance_contract_present' => hasGovernanceContract($token['contract_address'], $network['symbol']),
        'admin_privileges_limited' => checkAdminPrivileges($token['contract_address'], $network['symbol']),
        'time_lock_on_actions' => hasTimeLock($token['contract_address'], $network['symbol']),
        'upgradability_enabled' => isUpgradeable($token['contract_address'], $network['symbol']),
        'governance_token_present' => hasGovernanceToken($token['contract_address'], $network['symbol']),
        'dao_voting_enabled' => hasDAOVoting($token['contract_address'], $network['symbol'])
    ];
    return buildVerificationResult($checks, 15);
}

function verifyTokenomics($token, $network) {
    $checks = [
        'tokenomics_documented' => !empty($token['tokenomics_link']),
        'pre_mint_percentage_valid' => isPercentageValid($token['pre_mint_percentage']),
        'team_allocation_valid' => isPercentageValid($token['team_allocation']),
        'community_allocation_valid' => isPercentageValid($token['community_allocation']),
        'marketing_allocation_valid' => isPercentageValid($token['marketing_allocation']),
        'reserve_allocation_valid' => isPercentageValid($token['reserve_allocation']),
        'vesting_schedule_available' => !empty($token['vesting_schedule']),
        'token_release_schedule' => !empty($token['release_schedule']),
        'burn_mechanism_present' => hasBurnMechanism($token['contract_address'], $network['symbol']),
        'emission_rate_consistent' => isEmissionRateConsistent($token['contract_address'], $network['symbol'])
    ];
    return buildVerificationResult($checks, 10);
}

function verifyLiquidityMarkets($token, $network) {
    $liquidity = getLiquidityInfo($token['contract_address'], $network['symbol']);
    $checks = [
        'initial_liquidity_adequate' => $liquidity['initial_amount'] >= 1,
        'liquidity_locked' => $liquidity['locked'],
        'liquidity_lock_duration' => $liquidity['lock_days'] >= 30,
        'liquidity_lock_platform' => !empty($liquidity['lock_platform']),
        'current_liquidity_tvl' => $liquidity['tvl'] >= 10000,
        'dex_listings_present' => count($liquidity['dex_listings']) > 0,
        'cex_listings_present' => count($liquidity['cex_listings']) > 0,
        'slippage_reasonable' => $liquidity['slippage'] <= 5,
        'anti_snipe_measures' => $liquidity['anti_snipe'],
        'liquidity_pool_healthy' => $liquidity['health_score'] >= 70
    ];
    return buildVerificationResult($checks, 15);
}

function verifyHoldersDistribution($token, $network) {
    $holders = getTokenHolders($token['contract_address'], $network['symbol']);
    $checks = [
        'holder_count_adequate' => $holders['count'] >= 100,
        'top_holder_percentage' => $holders['top_holder_percent'] <= 20,
        'top_5_distribution' => $holders['top_5_percent'] <= 50,
        'developer_holding' => $holders['dev_wallets_percent'] <= 20,
        'whale_wallets_detected' => $holders['whale_count'] <= 5,
        'team_tokens_vested' => $holders['team_vested'],
        'team_tokens_locked' => $holders['team_locked'],
        'dead_wallet_percentage' => $holders['dead_percent'] >= 1,
        'staking_distribution' => $holders['staking_percent'] >= 10,
        'governance_participation' => $holders['governance_participation'] >= 30
    ];
    return buildVerificationResult($checks, 10);
}

function verifySecurityAudit($token, $network) {
    $audits = getAuditInfo($token['contract_address'], $network['symbol']);
    $checks = [
        'audit_performed' => count($audits['audits']) > 0,
        'audit_provider_reputable' => $audits['reputable_provider'],
        'audit_findings_resolved' => $audits['critical_findings'] === 0,
        'reaudit_performed' => $audits['reaudited'],
        'bug_bounty_program' => $audits['bug_bounty'],
        'security_monitoring' => $audits['monitoring'],
        'static_analysis_clean' => $audits['static_analysis'],
        'runtime_analysis_clean' => $audits['runtime_analysis'],
        'known_vulnerabilities' => empty($audits['vulnerabilities']),
        'contract_complexity' => $audits['complexity_score'] <= 3
    ];
    return buildVerificationResult($checks, 15);
}

function verifyComplianceLegal($token, $network) {
    $compliance = getComplianceInfo($token['contract_address'], $network['symbol']);
    $checks = [
        'kyc_performed' => $compliance['kyc'],
        'kyc_provider_reputable' => !empty($compliance['kyc_provider']),
        'aml_checks_passed' => $compliance['aml'],
        'company_registered' => $compliance['registered'],
        'jurisdiction_clear' => !empty($compliance['jurisdiction']),
        'legal_opinion_available' => $compliance['legal_opinion'],
        'regulator_risk_low' => $compliance['regulator_risk'] === 'low',
        'terms_of_use' => !empty($compliance['terms_url']),
        'privacy_policy' => !empty($compliance['privacy_url']),
        'token_classification_clear' => !empty($compliance['token_type'])
    ];
    return buildVerificationResult($checks, 10);
}

function verifyCommunityPresence($token, $network) {
    $community = getCommunityInfo($token['contract_address'], $network['symbol']);
    $checks = [
        'website_active' => $community['website_active'],
        'whitepaper_available' => !empty($community['whitepaper_url']),
        'documentation_complete' => !empty($community['docs_url']),
        'twitter_verified' => $community['twitter_verified'],
        'telegram_active' => $community['telegram_active'],
        'discord_active' => $community['discord_active'],
        'blog_updated' => $community['blog_active'],
        'github_repository' => !empty($community['github_url']),
        'github_activity' => $community['github_commits'] > 10,
        'community_engagement' => $community['engagement_score'] >= 70
    ];
    return buildVerificationResult($checks, 10);
}

function verifyEcosystemUseCases($token, $network) {
    $ecosystem = getEcosystemInfo($token['contract_address'], $network['symbol']);
    $checks = [
        'use_case_clear' => !empty($ecosystem['use_case']),
        'partnerships_active' => count($ecosystem['partners']) > 0,
        'real_world_utility' => $ecosystem['real_world_use'],
        'dapp_integrations' => $ecosystem['dapp_count'] > 0,
        'cross_chain_support' => $ecosystem['cross_chain'],
        'interoperability' => !empty($ecosystem['interop_protocols']),
        'oracle_integration' => !empty($ecosystem['oracles']),
        'developer_incentives' => $ecosystem['dev_incentives'],
        'ecosystem_funds' => $ecosystem['ecosystem_fund'] > 0,
        'roadmap_transparent' => !empty($ecosystem['roadmap_url'])
    ];
    return buildVerificationResult($checks, 10);
}

function getContractSourceCode($contractAddress, $networkSymbol) {
    $cacheKey = "source_code_{$contractAddress}_{$networkSymbol}";
    $cached = getFromCache($cacheKey);
    if ($cached) return $cached;

    $url = "https://api.etherscan.io/api?module=contract&action=getsourcecode&address=$contractAddress";
    if ($networkSymbol === 'BSC') {
        $url = "https://api.bscscan.com/api?module=contract&action=getsourcecode&address=$contractAddress";
    } elseif ($networkSymbol === 'BASE') {
        $url = "https://api.basescan.org/api?module=contract&action=getsourcecode&address=$contractAddress";
    }

    $response = file_get_contents($url);
    $data = json_decode($response, true);
    $result = $data && $data['status'] === '1' ? $data['result'][0] : ['verified' => false];
    
    saveToCache($cacheKey, $result, 86400);
    return $result;
}

function getTokenHolders($contractAddress, $networkSymbol) {
    $cacheKey = "holders_{$contractAddress}_{$networkSymbol}";
    $cached = getFromCache($cacheKey);
    if ($cached) return $cached;

    $url = "https://api.etherscan.io/api?module=token&action=tokenholderlist&contractaddress=$contractAddress";
    if ($networkSymbol === 'BSC') {
        $url = "https://api.bscscan.com/api?module=token&action=tokenholderlist&contractaddress=$contractAddress";
    } elseif ($networkSymbol === 'BASE') {
        $url = "https://api.basescan.org/api?module=token&action=tokenholderlist&contractaddress=$contractAddress";
    }

    $response = file_get_contents($url);
    $data = json_decode($response, true);
    $holders = $data && $data['status'] === '1' ? $data['result'] : [];
    
    $total = array_sum(array_column($holders, 'value'));
    $topHolder = $holders ? ($holders[0]['value'] / $total * 100) : 0;
    $top5 = $holders ? (array_sum(array_column(array_slice($holders, 0, 5), 'value')) / $total * 100) : 0;
    
    $result = [
        'count' => count($holders),
        'top_holder_percent' => $topHolder,
        'top_5_percent' => $top5,
        'dev_wallets_percent' => 0,
        'whale_count' => 0,
        'team_vested' => false,
        'team_locked' => false,
        'dead_percent' => 0,
        'staking_percent' => 0,
        'governance_participation' => 0
    ];

    saveToCache($cacheKey, $result, 3600);
    return $result;
}

function getLiquidityInfo($contractAddress, $networkSymbol) {
    $cacheKey = "liquidity_{$contractAddress}_{$networkSymbol}";
    $cached = getFromCache($cacheKey);
    if ($cached) return $cached;

    $url = "https://api.dexscreener.com/latest/dex/tokens/$contractAddress";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    
    $result = [
        'initial_amount' => 0,
        'locked' => false,
        'lock_days' => 0,
        'lock_platform' => '',
        'tvl' => 0,
        'dex_listings' => [],
        'cex_listings' => [],
        'slippage' => 0,
        'anti_snipe' => false,
        'health_score' => 0
    ];

    if ($data && isset($data['pairs'])) {
        $result['tvl'] = $data['pairs'][0]['liquidity']['usd'] ?? 0;
        $result['dex_listings'] = array_map(function($pair) {
            return [
                'exchange' => $pair['dexId'],
                'pair' => $pair['baseToken']['symbol'] . '-' . $pair['quoteToken']['symbol']
            ];
        }, $data['pairs']);
    }

    saveToCache($cacheKey, $result, 3600);
    return $result;
}

function getFromCache($key) {
    $cacheFile = CACHE_DIR . md5($key) . '.json';
    if (file_exists($cacheFile)) {
        $data = file_get_contents($cacheFile);
        $cache = json_decode($data, true);
        if ($cache && isset($cache['expires']) && $cache['expires'] > time()) {
            return $cache['data'];
        }
    }
    return false;
}

function saveToCache($key, $data, $ttl) {
    $cacheFile = CACHE_DIR . md5($key) . '.json';
    $cache = [
        'data' => $data,
        'expires' => time() + $ttl
    ];
    file_put_contents($cacheFile, json_encode($cache));
}

function buildVerificationResult($checks, $weight) {
    $passed = count(array_filter($checks));
    $total = count($checks);
    $score = $total > 0 ? round(($passed / $total) * 100) : 0;
    return [
        'checks' => $checks,
        'score' => $score,
        'weight' => $weight,
        'status' => getStatusFromScore($score)
    ];
}

function calculateOverallScore($verification) {
    $totalScore = 0;
    $totalWeight = 0;
    foreach ($verification as $category) {
        $totalScore += $category['score'] * $category['weight'];
        $totalWeight += $category['weight'];
    }
    return $totalWeight > 0 ? round($totalScore / $totalWeight) : 0;
}

function getStatusFromScore($score) {
    if ($score >= 80) return 'verified';
    if ($score >= 50) return 'warning';
    return 'danger';
}

function isValidAddress($address) {
    return preg_match('/^0x[a-fA-F0-9]{40}$/', $address);
}

function formatNetwork($network) {
    return [
        'id' => (int)$network['id'],
        'name' => $network['name'],
        'symbol' => $network['symbol'],
        'slug' => $network['slug'],
        'chain_id' => $network['chain_id'],
        'explorer_url' => $network['explorer_url']
    ];
}

function formatToken($token) {
    return [
        'id' => (int)$token['id'],
        'name' => $token['name'],
        'symbol' => $token['symbol'],
        'contract_address' => $token['contract_address'],
        'decimals' => (int)$token['decimals'],
        'price' => (float)$token['price'],
        'market_cap' => $token['market_cap'] ? (float)$token['market_cap'] : null,
        'logo_url' => $token['logo_url'],
        'network' => [
            'id' => (int)$token['network_id'],
            'name' => $token['network_name'],
            'symbol' => $token['network_symbol'],
            'slug' => $token['network_slug']
        ]
    ];
}

function formatReportItem($item) {
    return [
        'token' => [
            'id' => (int)$item['id'],
            'name' => $item['name'],
            'symbol' => $item['symbol'],
            'contract_address' => $item['contract_address']
        ],
        'network' => [
            'name' => $item['network_name'],
            'symbol' => $item['network_symbol']
        ],
        'verification_status' => $item['verification_status'],
        'last_verified_at' => $item['last_verified_at']
    ];
}

function getNetworkById($networkId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM networks WHERE id = :id");
    $stmt->execute([':id' => $networkId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function sendDatabaseError($exception) {
    error_log("Database error: " . $exception->getMessage());
    echo json_encode(['success' => false, 'error' => 'Database operation failed']);
}

function containsUpgradePattern($source) { return strpos($source, 'upgradeTo') !== false; }
function containsProxyPattern($source) { return strpos($source, 'delegatecall') !== false; }
function containsAdminFunctions($source) { return preg_match('/function\s+setAdmin|function\s+transferOwnership/', $source); }
function containsMintFunction($source) { return strpos($source, 'function mint') !== false; }
function containsBurnFunction($source) { return strpos($source, 'function burn') !== false; }
function containsPauseFunction($source) { return strpos($source, 'function pause') !== false; }
function containsBlacklist($source) { return strpos($source, 'blacklist') !== false; }
function containsSelfDestruct($source) { return strpos($source, 'selfdestruct') !== false; }
function isMultiSigWallet($address, $network) { return false; }
function hasGovernanceContract($contract, $network) { return false; }
function checkAdminPrivileges($contract, $network) { return false; }
function hasTimeLock($contract, $network) { return false; }
function isUpgradeable($contract, $network) { return false; }
function hasGovernanceToken($contract, $network) { return false; }
function hasDAOVoting($contract, $network) { return false; }
function isPercentageValid($percentage) { return is_numeric($percentage) && $percentage >= 0 && $percentage <= 100; }
function hasBurnMechanism($contract, $network) { return false; }
function isEmissionRateConsistent($contract, $network) { return false; }
function getAuditInfo($contract, $network) { return ['audits' => [], 'reputable_provider' => false, 'critical_findings' => 0, 'reaudited' => false, 'bug_bounty' => false, 'monitoring' => false, 'static_analysis' => false, 'runtime_analysis' => false, 'vulnerabilities' => [], 'complexity_score' => 0]; }
function getComplianceInfo($contract, $network) { return ['kyc' => false, 'kyc_provider' => '', 'aml' => false, 'registered' => false, 'jurisdiction' => '', 'legal_opinion' => false, 'regulator_risk' => 'high', 'terms_url' => '', 'privacy_url' => '', 'token_type' => '']; }
function getCommunityInfo($contract, $network) { return ['website_active' => false, 'whitepaper_url' => '', 'docs_url' => '', 'twitter_verified' => false, 'telegram_active' => false, 'discord_active' => false, 'blog_active' => false, 'github_url' => '', 'github_commits' => 0, 'engagement_score' => 0]; }
function getEcosystemInfo($contract, $network) { return ['use_case' => '', 'partners' => [], 'real_world_use' => false, 'dapp_count' => 0, 'cross_chain' => false, 'interop_protocols' => [], 'oracles' => [], 'dev_incentives' => false, 'ecosystem_fund' => 0, 'roadmap_url' => '']; }
function verifyTokenSupply($token, $type) { return true; }
function getContractOwner($contractAddress, $networkSymbol) { return '0x0000000000000000000000000000000000000000'; }