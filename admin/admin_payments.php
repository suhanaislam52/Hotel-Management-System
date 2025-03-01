<?php
$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = ''; 

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM payment";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Payments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #42f5f2;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Payments of Guests</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Guest Name</th>
                    <th>Card Number</th>
                    <th>Contact Name</th>
                    <th>Amount To Deduct</th>
                    <th>Change Received</th>
                    <th>Payment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['paymentId']}</td>";
                        echo "<td>{$row['guestName']}</td>";
                        echo "<td>{$row['cardNumber']}</td>";
                        echo "<td>{$row['contactName']}</td>";
                        echo "<td>{$row['amountToDeduct']}</td>";
                        echo "<td>{$row['changeReceived']}</td>";
                        echo "<td>{$row['paymentDate']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No payments found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$con->close();
?>
