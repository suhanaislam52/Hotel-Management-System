<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = ''; 

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO complain (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<p>Your message has been successfully submitted.</p>";
    } else {
        echo "<p>Error submitting your message.</p>";
    }

    $stmt->close();
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sapphire Hotel-CONTACT</title>
    <style>
        .custom-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .custom-btn:hover {
            background-color: darkgreen;
        }
    </style>
    <?php require('inc/links.php');?>
</head>
<body class="bg-light">
    <?php require('inc/header.php');?>
  
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
        We are here to assist you with any inquiries you may have
        Feel free to reach out to us via phone, email, or social media.
        Your feedback and questions are important to us!
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <h5>Contact Us</h5>
                    <p><i class="bi bi-geo-alt-fill"></i>123 Beachfront Avenue, Ocean City, California</p>
                    <p><i class="bi bi-telephone-fill"></i>+1 (415) 555-1234</p>
                    <p><i class="bi bi-telephone-fill"></i>+1 (213) 555-6789</p>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-envelope-at-fill me-2"></i>
                        <a href="mailto:sapphirehotel@gmail.com" class="mb-0">sapphirehotel@gmail.com</a>
                    </div>
                    <div class="mt-4">
                        <h5 class="mb-3">Follow Us</h5>
                        <a href="#" class="d-inline-block fs-5 me-2">
                            <i class="bi bi-facebook me-1"></i>
                        </a>
                        <a href="#" class="d-inline-block fs-5 me-2">
                            <i class="bi bi-instagram me-1"></i>
                        </a>
                        <a href="#" class="d-inline-block fs-5 me-2">
                            <i class="bi bi-twitter me-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="post">
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Name</label>
                            <input type="text" class="form-control shadow-none" name="name">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Email</label>
                            <input type="email" class="form-control shadow-none" name="email">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Subject</label>
                            <input type="text" class="form-control shadow-none" name="subject">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize:none;" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn text-white mt-3 mx-auto d-block" name="submit" style="background-color: green; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Send</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php require('inc/footer.php');?>
</body>
</html>
