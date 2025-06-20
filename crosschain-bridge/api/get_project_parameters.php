<?php
// api/get_project_parameters.php
header('Content-Type: application/json');

// Example static data
$projectParameters = [
    ['name' => 'Number of Users', 'value' => 500],
    ['name' => 'Number of Transactions', 'value' => 2000],
    ['name' => 'Volume', 'value' => 1000000]
];

// Encode data as JSON and send it as response
echo json_encode($projectParameters);
?>
