<?php
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $nid = $_POST['nid'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password']; 2

    $sql = "INSERT INTO registration_details (first_name, last_name, phone_number, address, gender, nid, dob, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssss", $first_name, $last_name, $phone_number, $address, $gender, $nid, $dob, $email, $password);

    if ($stmt->execute()) {
        $registration_message = "Registration successful!";
    } else {
        $registration_message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-info">
            <?php echo $registration_message; ?>
        </div>
        <a href="index.php" class="btn btn-primary">Go to Homepage</a>
    </div>
</body>
</html>
