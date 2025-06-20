<?php
header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'server' => $_SERVER,
    'request' => $_REQUEST
]);