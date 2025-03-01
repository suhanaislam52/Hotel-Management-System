<?php

$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = ''; 

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchBooking'])) {
   
    $fullName = $_POST['fullName'];

    $sql_select_booking = "SELECT * FROM finalbooking WHERE guestName = ?";
    $stmt_select_booking = $con->prepare($sql_select_booking);
    $stmt_select_booking->bind_param("s", $fullName);
    $stmt_select_booking->execute();
    $result = $stmt_select_booking->get_result();

    if ($result->num_rows > 0) {
        // Display booking information
        echo "<h2>Booking Information for $fullName</h2>";
        echo "<table border='1'>
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
                    <th>outdoor activities</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['bookingId'] . "</td>";
            echo "<td>" . $row['guestName'] . "</td>";
            echo "<td>" . $row['check_in_date'] . "</td>";
            echo "<td>" . $row['check_out_date'] . "</td>";
            echo "<td>" . $row['roomId'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['paymentMethod'] . "</td>";
            echo "<td>" . $row['specialRequests'] . "</td>";
            echo "<td>" . $row['spaTreatment'] . "</td>";
            echo "<td>" . $row['gym'] . "</td>";
            echo "<td>" . $row['laundry'] . "</td>";
            echo "<td>" . $row['parking'] . "</td>";
            echo "<td>" . $row['transportation'] . "</td>";
            echo "<td>" . $row['outdoorActivities'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No booking found for $fullName</p>";
    }

    $stmt_select_booking->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #FFDAB9; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>View Bookings</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="fullName" class="form-label">Enter Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <button type="submit" class="btn btn-primary" name="searchBooking">Search</button>
        </form>
    </div>
    <a href="index.php" class="btn btn-primary mt-3">Back to Homepage</a>
</body>
</html>
