<?php
// api/get_competitive_analysis.php
header('Content-Type: application/json');
include '../db_connection.php';

$sql = "SELECT name, users, transactions, volume FROM competitors";
$result = $conn->query($sql);

$competitors = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $competitors[] = $row;
  }
}

echo json_encode($competitors);
$conn->close();
?>
