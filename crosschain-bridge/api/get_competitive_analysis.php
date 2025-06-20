<?php
// api/get_competitive_analysis.php
header('Content-Type: application/json');

// Example static data
$competitors = [
    ['name' => 'Competitor A', 'users' => 1000, 'transactions' => 5000, 'volume' => 100000],
    ['name' => 'Competitor B', 'users' => 800, 'transactions' => 4500, 'volume' => 90000]
];

// Encode data as JSON and send it as response
echo json_encode($competitors);
?>
