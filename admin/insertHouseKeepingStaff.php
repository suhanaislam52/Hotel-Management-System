<?php
   require('inc/db_config.php');
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Existing Guests</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Existing Guests</h2>
    <?php
    
    require('inc/db_config.php');

    
    $sql = "SELECT * FROM `Guest List`";

    
    $result = $con->query($sql);

    
    if ($result->num_rows > 0) {
        
        echo "<table><tr><th>Guest ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Gender</th><th>NID</th><th>Address</th><th>Check In Date</th><th>Check Out Date</th><th>Payment Status</th></tr>";

        
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["guest_id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["email"]."</td><td>".$row["phone_no"]."</td><td>".$row["gender"]."</td><td>".$row["NID"]."</td><td>".$row["address"]."</td><td>".$row["check_in_date"]."</td><td>".$row["check_out_date"]."</td><td>".$row["payment_status"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No guests found.";
    }

   
    $con->close();
    ?>
</body>
</html>
