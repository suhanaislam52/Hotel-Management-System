<?php

$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = ''; 

$con = new mysqli($host, $user, $pass, $db);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['saveTreatment'])) {
   
    $fullName = $_POST['fullName'];
    $age = $_POST['age'];
    $contactNumber = $_POST['contactNumber'];
    $signupDate = date("Y-m-d", strtotime($_POST['signupDate'])); 
    $spaTreatments = implode(", ", $_POST['spaTreatments']);

   
    $sql_insert_treatment = "INSERT INTO spatreatment (fullName, age, contactNumber, signupDate, spaTreatments) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert_treatment = $con->prepare($sql_insert_treatment);
    $stmt_insert_treatment->bind_param("sisss", $fullName, $age, $contactNumber, $signupDate, $spaTreatments);
    $stmt_insert_treatment->execute();

    
    if ($stmt_insert_treatment->affected_rows > 0) {
        echo "<p>Spa treatment details saved successfully.</p>";
    } else {
        echo "<p>Error saving spa treatment details.</p>";
    }

    
    $stmt_insert_treatment->close();
}


$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spa Treatment Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Spa Treatment Signup</h1>
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
                <label class="form-label">Spa Treatments:</label>
                <div>
                    <input type="checkbox" id="bodyMassage" name="spaTreatments[]" value="Body Massage">
                    <label for="bodyMassage">Body Massage</label>
                </div>
                <div>
                    <input type="checkbox" id="facial" name="spaTreatments[]" value="Facial">
                    <label for="facial">Facial</label>
                </div>
                <div>
                    <input type="checkbox" id="manicure" name="spaTreatments[]" value="Manicure">
                    <label for="manicure">Manicure</label>
                </div>
                <div>
                    <input type="checkbox" id="pedicure" name="spaTreatments[]" value="Pedicure">
                    <label for="pedicure">Pedicure</label>
                </div>
                <div>
                    <input type="checkbox" id="Aromatherapy" name="spaTreatments[]" value="Aromatherapy">
                    <label for="Aromatherapy">Aromatherapy</label>
                </div>
                <div>
                    <input type="checkbox" id="Scalp Massage" name="spaTreatments[]" value="Scalp Massage">
                    <label for="Scalp Massage">Scalp Massage</label>
                </div>
                <div>
                    <input type="checkbox" id="Foot Massage" name="spaTreatments[]" value="Foot Massage">
                    <label for="Foot Massage">Foot Massage</label>
                </div>
               
            </div>
            <button type="submit" class="btn btn-primary" name="saveTreatment">Save Spa Treatment Details</button>
        </form>
        <a href="services.php" class="btn btn-primary mt-3">Back</a>
    </div>
</body>
</html>
