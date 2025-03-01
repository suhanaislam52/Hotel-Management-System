<?php
$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = ''; 

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM spatreatment";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Spa Treatment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #c842f5;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Spa Treatment</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Guest Name</th>
                    <th>Age</th>
                    <th>Contact Number</th>
                    <th>Signup Date</th>
                    <th>Spa Treatments</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['fullName']}</td>";
                        echo "<td>{$row['age']}</td>";
                        echo "<td>{$row['contactNumber']}</td>";
                        echo "<td>{$row['signupDate']}</td>";
                        echo "<td>{$row['spaTreatments']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No spa treatments found</td></tr>";
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
