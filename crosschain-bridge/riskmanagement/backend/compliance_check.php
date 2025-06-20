<?php
include('config.php');

// Fetch compliance data
$query = "SELECT protocol_name, status, details FROM compliance_reports";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['protocol_name']}</td><td>{$row['status']}</td><td>{$row['details']}</td></tr>";
}
?>
