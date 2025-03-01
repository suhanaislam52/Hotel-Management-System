<?php
require('inc/db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Existing HouseKeepin Staff</title>
    <style>
        body {
            background-color: #FFCCCC;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            vertical-align: top; 
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Existing HouseKeeping Staff</h2>

    <?php

    $sql = "SELECT * FROM `housekeepingstaff`";

    
    $result = $con->query($sql);

    if (!$result) {
        echo "Error: " . $con->error;
    } else {
        if ($result->num_rows > 0) {
            
            echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Gender</th><th>nid</th><th>Address</th><th>room_number</th><th>position</th><th>Shift_Schedule</th><th>Employment_Status</th><th>Salary</th><th>Date_of_Hire</th><th>Qualifications</th></tr>";

            
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["ID"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["phone_no"]."</td><td>".$row["gender"]."</td><td>".$row["nid"]."</td><td>".$row["address"]."</td><td>".$row["room_number"]."</td><td>".$row["position"]."</td><td>".$row["Shift_Schedule"]."</td><td>".$row["Employment_Status"]."</td><td>".$row["Salary"]."</td><td>".$row["Date_of_Hire"]."</td><td>".$row["Qualifications"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No HouseKeeping Staff found.";
        }
    }

    $con->close();
    ?>
</body>
</html>
