<?php
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration_details WHERE Email = ? AND Password = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        
        $login_message = "Login successful!";
    } else {
        
        $login_message = "Incorrect email address or password!";
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
    <title>Login Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        .custom-btn {
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-info">
            <?php echo $login_message; ?>
        </div>
        
        <a href="index.php" class="btn btn-primary mt-3">Go to Homepage</a>
       
        <div class="row mt-3 justify-content-center">
            <div class="col-md-3 text-center mb-3">
                <a href="bookroom.php" class="btn btn-warning custom-btn">BOOK A ROOM NOW</a>
            </div>
            <div class="col-md-3 text-center mb-3">
                <a href="viewbookings.php" class="btn btn-warning custom-btn">VIEW MY BOOKINGS</a>
            </div>
        </div>
    </div>
</body>
</html>
