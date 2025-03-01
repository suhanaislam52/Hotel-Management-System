<?php

$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = ''; 

$con = new mysqli($host, $user, $pass, $db);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['savePayment'])) {
    
    $guestName = $_POST['guestName'];
    $cardNumber = $_POST['cardNumber'];
    $contactName = $_POST['contactName'];
    $amountToDeduct = $_POST['amountToDeduct'];
    $changeReceived = isset($_POST['changeReceived']) ? $_POST['changeReceived'] : null;
    $paymentDate = $_POST['paymentDate'];

  
    $sql_insert_payment = "INSERT INTO payment (guestName, cardNumber, contactName, amountToDeduct, changeReceived, paymentDate) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_insert_payment = $con->prepare($sql_insert_payment);
    $stmt_insert_payment->bind_param("ssssss", $guestName, $cardNumber, $contactName, $amountToDeduct, $changeReceived, $paymentDate);
    $stmt_insert_payment->execute();

   
    if ($stmt_insert_payment->affected_rows > 0) {
        echo "<p>Payment details saved successfully.</p>";
    } else {
        echo "<p>Error saving payment details.</p>";
    }

  
    $stmt_insert_payment->close();
}


$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d4edda;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Payment</h1>
        <h2 style="font-size: 1em;">FULL AMOUNT MUST BE PAID DURING CHECK-IN. Now please pay $100 as an advance</h2>

        <form method="post" action="">
            <div class="mb-3">
                <label for="guestName" class="form-label">Guest Name:</label>
                <input type="text" class="form-control" id="guestName" name="guestName" required>
            </div>
       
            <div class="mb-3">
                <label for="cardNumber" class="form-label">Card Number:</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
            </div>
            <div class="mb-3">
                <label for="contactName" class="form-label">Contact Name:</label>
                <input type="text" class="form-control" id="contactName" name="contactName" required>
            </div>
            <div class="mb-3">
                <label for="amountToDeduct" class="form-label">Amount to be deducted:</label>
                <input type="number" class="form-control" id="amountToDeduct" name="amountToDeduct" required>
            </div>
            <div class="mb-3">
                <label for="changeReceived" class="form-label">Change Received (optional):</label>
                <input type="number" class="form-control" id="changeReceived" name="changeReceived">
            </div>
            <div class="mb-3">
                <label for="paymentDate" class="form-label">Payment Date:</label>
                <input type="date" class="form-control" id="paymentDate" name="paymentDate" required>
            </div>
            <button type="submit" class="btn btn-primary" name="savePayment">Save Payment Details</button>
        </form>
        <p>
            <strong>Notice:</strong> If any cancellation is to be made, it should be done two days prior to the check-in date. Otherwise, no refund is possible.
        </p>
        <form method="get" action="services.php">
            <button type="submit" class="btn btn-secondary">Go to Services</button>
        </form>
    </div>
</body>
</html>
