<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Methods</title>
  <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
  
  <style>
   
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0; 
      font-family: sans-serif; 
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 20px auto;
      max-width: 400px;
      padding: 20px;
      border-radius: 5px;
      background-color: #f5f5f5;
    }
    
    .checkout-button {
      text-decoration: none; 
      display: inline-block;
      padding: 12px 20px; 
      border: none;
      border-radius: 50px; 
      font-size: 16px;
      color: white;
      cursor: pointer;
      margin-bottom: 10px;
      background-color: black; 
      font-family: 'Rubik', sans-serif; 
      text-align: center; 
    }
    
    .checkout-button:hover {
      background-color: #333; 
    }
    
    /* Added style for h1 */
    h1 {
      font-family: 'Rubik', sans-serif; 
      font-weight: bold; 
    }
  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap">
</head>
<body>
  <div class="container">
    <h1>Choose Checkout Method</h1>
    <br>
    <br>
    
    
    
    <a href="paypalcheckout.php" class="checkout-button">PayPal</a>
    
    <a href="#" class="checkout-button">Coinbase</a>
    
    <a href="#" class="checkout-button">Visa</a>
    
    <a href="digpegexchange.com/pesapal_checkout.php" class="checkout-button">Pesapal</a>
    
    <a href="airtelmoney_checkout.php" class="checkout-button">Mobile Money</a>
    
    <a href="#" class="checkout-button">USDT</a>
    <br>
    <br>
    <a href="digpegpayments.php" class="checkout-button">Back</a>
  </div>
</body>
</html>
