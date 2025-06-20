<?php
// api/get_project_parameters.php
header('Content-Type: application/json');
include '../db_connection.php';

$sql = "SELECT name, value FROM project_parameters";
$result = $conn->query($sql);

$projectParameters = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $projectParameters[] = $row;
  }
}

echo json_encode($projectParameters);
$conn->close();
?>
