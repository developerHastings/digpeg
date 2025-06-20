<?php
// Database connection
$host = "localhost";
$username = "digpegex_wp343";
$password = "tx-7]{AEgQ&8";
$dbname = "digpegex_digpegexDB";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $package = $_POST['package'];
    $amount = $_POST['amount'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $apartment = $_POST['apartment'] ?? '';
    $country = $_POST['country'];
    $order_id = $_POST['order_id'] ?? null;
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $shirt_size = $_POST['shirt_size'];
    $shirt_color = $_POST['shirt_color'];

    // Optional security validation (make sure amount matches known values)
    $allowedPackages = [
        "Digital Products Verification" => 299,
        "Digital Products Exit" => 100000
    ];
    if (!array_key_exists($package, $allowedPackages) || $allowedPackages[$package] != $amount) {
        die("Invalid package or tampered amount.");
    }

    // Insert into database
    $stmt = $pdo->prepare("
        INSERT INTO checkout_orders 
        (package, amount, first_name, last_name, address, apartment, country, order_id, email, phone, shirt_size, shirt_color, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    $stmt->execute([
        $package, $amount, $first_name, $last_name, $address, $apartment, $country,
        $order_id, $email, $phone, $shirt_size, $shirt_color
    ]);

    // Redirect to PayPal payment link (placeholder)
    $paypal_link = "https://www.paypal.com/ncp/payment/7WRT9BMU5CKRY";
header("Location: $paypal_link");
exit();
}
?>
