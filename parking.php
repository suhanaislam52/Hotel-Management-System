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

    $sql_insert_signup = "INSERT INTO parking (fullName, age, contactNumber, signupDate, services) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert_signup = $con->prepare($sql_insert_signup);
    $stmt_insert_signup->bind_param("sisss", $fullName, $age, $contactNumber, $signupDate, $services);
    $stmt_insert_signup->execute();

    if ($stmt_insert_signup->affected_rows > 0) {
        echo "<p>Parking signup details saved successfully.</p>";
    } else {
        echo "<p>Error saving parking signup details.</p>";
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
    <title>Parking Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: lightyellow;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Parking Signup</h1>
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
                <label class="form-label">Parking Services:</label>
                <div>
                    <input type="checkbox" id="coveredParking" name="services[]" value="Covered Parking">
                    <label for="coveredParking">Covered Parking</label>
                </div>
                <div>
                    <input type="checkbox" id="uncoveredParking" name="services[]" value="Uncovered Parking">
                    <label for="uncoveredParking">Uncovered Parking</label>
                </div>
                <div>
                    <input type="checkbox" id="valetParking" name="services[]" value="Valet Parking">
                    <label for="valetParking">Valet Parking</label>
                </div>
                <div>
                    <input type="checkbox" id="longTermParking" name="services[]" value="Long-term Parking">
                    <label for="longTermParking">Long-term Parking</label>
                </div>
                <div>
                    <input type="checkbox" id="shortTermParking" name="services[]" value="Short-term Parking">
                    <label for="shortTermParking">Short-term Parking</label>
                </div>
                <div>
                    <input type="checkbox" id="evCharging" name="services[]" value="Electric Vehicle Charging">
                    <label for="evCharging">Electric Vehicle Charging</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="saveSignup">Save Parking Signup Details</button>
        </form>
        <a href="services.php" class="btn btn-primary mt-3">Back</a>
    </div>
</body>
</html>
