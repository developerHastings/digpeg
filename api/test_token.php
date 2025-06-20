<?php
define('HYPERSYNC_TOKEN', '5bfe0eec-2309-4fb2-8543-9eb2ea4ea4df');

$test_query = [
    'query' => [
        'from_block' => 0,
        'logs' => [[
            'topics' => [
                ['0xddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef']
            ]
        ]],
        'max_num_transactions' => 1
    ]
];

$context = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => implode("\r\n", [
            'Content-Type: application/json',
            'Authorization: Bearer ' . HYPERSYNC_TOKEN,
            'Accept: application/json'
        ]),
        'content' => json_encode($test_query),
        'timeout' => 5
    ]
]);

$response = file_get_contents('https://base.hypersync.xyz/query', false, $context);

header('Content-Type: application/json');
echo $response ?: json_encode(['error' => 'No response from HyperSync']);