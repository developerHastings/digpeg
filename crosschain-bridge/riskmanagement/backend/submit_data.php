<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $protocol_data = mysqli_real_escape_string($conn, $_POST['protocol_data']);

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO protocol_submissions (data, submitted_at) VALUES (?, NOW())");
    $stmt->bind_param("s", $protocol_data);
    $stmt->execute();
    $stmt->close();

    echo "Data submitted successfully!";
}
?>
