<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $userId = $_SESSION['user_id'];

    // Update user data
    $stmt = $conn->prepare("UPDATE users SET username=?, password=? WHERE id=?");
    $stmt->bind_param("ssi", $username, $password, $userId);
    $stmt->execute();
    $stmt->close();

    echo "Account updated successfully!";
}
?>
