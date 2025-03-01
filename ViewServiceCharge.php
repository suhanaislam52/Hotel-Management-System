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


$sql = "SELECT id, service_name, price FROM service_charge";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Service Charges</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
     body{
        background-color: #42bcf5;

     }
        </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Service Charges</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                if ($result->num_rows > 0) {
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['service_name']}</td>
                                <td>{$row['price']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No records found</td></tr>";
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
