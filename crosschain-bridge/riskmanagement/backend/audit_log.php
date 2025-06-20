<?php
include('config.php');

// Log user actions for security purposes
function logAction($userId, $action) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO audit_logs (user_id, action, timestamp) VALUES (?, ?, ?)");
    $timestamp = date("Y-m-d H:i:s");
    $stmt->bind_param("iss", $userId, $action, $timestamp);
    $stmt->execute();
    $stmt->close();
}
?>
