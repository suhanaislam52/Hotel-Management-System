<?php
$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = ''; 

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM finalbooking";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFDAB9; /* Pale orange color */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Reservations</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Guest Name</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Room ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Special Requests</th>
                    <th>Spa Treatment</th>
                    <th>GYM</th>
                    <th>Laundry</th>
                    <th>Parking</th>
                    <th>Transportation</th>
                    <th>Outdoor Activities</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['bookingId']}</td>";
                        echo "<td>{$row['guestName']}</td>";
                        echo "<td>{$row['check_in_date']}</td>";
                        echo "<td>{$row['check_out_date']}</td>";
                        echo "<td>{$row['roomId']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['paymentMethod']}</td>";
                        echo "<td>{$row['specialRequests']}</td>";
                        echo "<td>{$row['spaTreatment']}</td>";
                        echo "<td>{$row['gym']}</td>";
                        echo "<td>{$row['laundry']}</td>";
                        echo "<td>{$row['parking']}</td>";
                        echo "<td>{$row['transportation']}</td>";
                        echo "<td>{$row['outdoorActivities']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='16'>No reservations found</td></tr>";
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
