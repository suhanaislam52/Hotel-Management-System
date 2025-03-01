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

    $sql_insert_signup = "INSERT INTO laundry (fullName, age, contactNumber, signupDate, services) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert_signup = $con->prepare($sql_insert_signup);
    $stmt_insert_signup->bind_param("sisss", $fullName, $age, $contactNumber, $signupDate, $services);
    $stmt_insert_signup->execute();

    if ($stmt_insert_signup->affected_rows > 0) {
        echo "<p>Laundry signup details saved successfully.</p>";
    } else {
        echo "<p>Error saving laundry signup details.</p>";
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
    <title>Laundry Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Laundry Signup</h1>
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
                <label class="form-label">Laundry Services:</label>
                <div>
                    <input type="checkbox" id="washing" name="services[]" value="Washing">
                    <label for="washing">Washing</label>
                </div>
                <div>
                    <input type="checkbox" id="dryCleaning" name="services[]" value="Dry Cleaning">
                    <label for="dryCleaning">Dry Cleaning</label>
                </div>
                <div>
                    <input type="checkbox" id="ironing" name="services[]" value="Ironing">
                    <label for="ironing">Ironing</label>
                </div>
                <div>
                    <input type="checkbox" id="folding" name="services[]" value="Folding">
                    <label for="folding">Folding</label>
                </div>
                <div>
                    <input type="checkbox" id="stainRemoval" name="services[]" value="Stain Removal">
                    <label for="stainRemoval">Stain Removal</label>
                </div>
                <div>
                    <input type="checkbox" id="expressService" name="services[]" value="Express Service">
                    <label for="expressService">Express Service</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="saveSignup">Save Laundry Signup Details</button>
        </form>
        <a href="services.php" class="btn btn-primary mt-3">Back</a>
    </div>
</body>
</html>
