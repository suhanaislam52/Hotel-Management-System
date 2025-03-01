<?php
require('inc/db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Hotel Inventory</title>
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
    <h2>Hotel Inventory List</h2>

    <?php
    
    $sql = "SELECT * FROM `List_of_Hotel_Inventory`";

    
    $result = $con->query($sql);

    if (!$result) {
        echo "Error: " . $con->error;
    } else {
        if ($result->num_rows > 0) {
            
            echo "<table><tr><th>Serial Number</th><th>Product Name</th><th>Stock Left</th><th>Restocked Date</th></tr>";

           
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["serial_number"]."</td><td>".$row["Name__Products"]."</td><td>".$row["Stock_Left"]."</td><td>".$row["Restocked_Date"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No items found in the hotel inventory.";
        }
    }

    $con->close();
    ?>
</body>
</html>
