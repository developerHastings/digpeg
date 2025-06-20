<?php
include('config.php');

// Fetch notifications
$query = "SELECT message, created_at FROM notifications ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>{$row['created_at']}: {$row['message']}</div>";
}
?>
