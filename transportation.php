<?php

$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = ''; 

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['saveSignup'])) {
   
    $fullName = $_POST['fullName'];
    $age = $_POST['age'];
    $contactNumber = $_POST['contactNumber'];
    $signupDate = date("Y-m-d", strtotime($_POST['signupDate'])); 
    $services = implode(", ", $_POST['services']);

    $sql_insert_signup = "INSERT INTO transportation (fullName, age, contactNumber, signupDate, services) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert_signup = $con->prepare($sql_insert_signup);
    $stmt_insert_signup->bind_param("sisss", $fullName, $age, $contactNumber, $signupDate, $services);
    $stmt_insert_signup->execute();

    if ($stmt_insert_signup->affected_rows > 0) {
        echo "<p>Transportation signup details saved successfully.</p>";
    } else {
        echo "<p>Error saving transportation signup details.</p>";
    }

    $stmt_insert_signup->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportation Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: lightgreen;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Transportation Signup</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name:</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="mb-3">
                <label for="contactNumber" class="form-label">Contact Number:</label>
                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
            </div>
            <div class="mb-3">
                <label for="signupDate" class="form-label">Signup Date:</label>
                <input type="date" class="form-control" id="signupDate" name="signupDate" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Transportation Services:</label>
                <div>
                    <input type="checkbox" id="airportPickup" name="services[]" value="Airport Pickup">
                    <label for="airportPickup">Airport Pickup</label>
                </div>
                <div>
                    <input type="checkbox" id="airportDropoff" name="services[]" value="Airport Drop-off">
                    <label for="airportDropoff">Airport Drop-off</label>
                </div>
                <div>
                    <input type="checkbox" id="cityTour" name="services[]" value="City Tour">
                    <label for="cityTour">City Tour</label>
                </div>
                <div>
                    <input type="checkbox" id="localShuttle" name="services[]" value="Local Shuttle">
                    <label for="localShuttle">Local Shuttle</label>
                </div>
                <div>
                    <input type="checkbox" id="carRental" name="services[]" value="Car Rental">
                    <label for="carRental">Car Rental</label>
                </div>
                <div>
                    <input type="checkbox" id="bikeRental" name="services[]" value="Bike Rental">
                    <label for="bikeRental">Bike Rental</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="saveSignup">Save Transportation Signup Details</button>
        </form>
        <a href="services.php" class="btn btn-primary mt-3">Back</a>
    </div>
</body>
</html>
