<?php

    require('inc/db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hotel Staff</title>
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
    <h2>Existing Hotel Staff</h2>
    <?php
        
        $sql = "SELECT * FROM hotelstaff";

        
        $result = $con->query($sql);

        
        if ($result->num_rows > 0) {
            
            echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Gender</th><th>Address</th><th>Department</th><th>Salary</th><th>In Charge Of</th></tr>";

            
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["ID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["Phone_number"]."</td><td>".$row["Gender"]."</td><td>".$row["Address"]."</td><td>".$row["Department"]."</td><td>".$row["Salary"]."</td><td>".$row["In_Charge_of"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No hotel staff found.";
        }

        
        $con->close();
    ?>
</body>
</html>
