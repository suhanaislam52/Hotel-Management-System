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
    $activities = implode(", ", $_POST['activities']);

    $sql_insert_signup = "INSERT INTO gym (fullName, age, contactNumber, signupDate, activities) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert_signup = $con->prepare($sql_insert_signup);
    $stmt_insert_signup->bind_param("sisss", $fullName, $age, $contactNumber, $signupDate, $activities);
    $stmt_insert_signup->execute();

    if ($stmt_insert_signup->affected_rows > 0) {
        echo "<p>Gym signup details saved successfully.</p>";
    } else {
        echo "<p>Error saving gym signup details.</p>";
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
    <title>Gym Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: lightpink;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Gym Signup</h1>
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
                <label class="form-label">Gym Activities:</label>
                <div>
                    <input type="checkbox" id="cardio" name="activities[]" value="Cardio">
                    <label for="cardio">Cardio</label>
                </div>
                <div>
                    <input type="checkbox" id="weightlifting" name="activities[]" value="Weightlifting">
                    <label for="weightlifting">Weightlifting</label>
                </div>
                <div>
                    <input type="checkbox" id="yoga" name="activities[]" value="Yoga">
                    <label for="yoga">Yoga</label>
                </div>
                <div>
                    <input type="checkbox" id="Aerobics" name="activities[]" value="Aerobics">
                    <label for="Aerobics">Aerobics</label>
                </div>
                <div>
                    <input type="checkbox" id="spinning" name="activities[]" value="Spinning">
                    <label for="spinning">Spinning</label>
                </div>
                <div>
                    <input type="checkbox" id="Bodybuilding" name="activities[]" value="Bodybuilding">
                    <label for="Bodybuilding">Bodybuilding</label>
                </div>
                <div>
                    <input type="checkbox" id="crossfit" name="activities[]" value="CrossFit">
                    <label for="crossfit">CrossFit</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="saveSignup">Save Gym Signup Details</button>
        </form>
        <a href="services.php" class="btn btn-primary mt-3">Back</a>
    </div>
</body>
</html>
