<?php
require('inc/db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Rooms</title>
  <style>
    body {
      background-color: #03fc80;
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
    img {
      /* Adjust image size and style as needed */
      max-width: 100px;
      height: auto;
    }
  </style>
</head>
<body>
  <h2>View Rooms</h2>

  <?php

  $sql = "SELECT id, name, image, features, facilities, guests, price FROM rooms";

  $result = $con->query($sql);

  if (!$result) {
    echo "Error: " . $con->error;
  } else {
    if ($result->num_rows > 0) {

      echo "<table><tr><th>ID</th><th>Name</th><th>Image</th><th>Features</th><th>Facilities</th><th>Guests</th><th>Price</th></tr>";

      while($row = $result->fetch_assoc()) {
        $imageUrl = $row["image"]; // Store image URL from the row
        
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$imageUrl."<br><img src='$imageUrl' alt='".$row["name"]."'></td><td>".$row["features"]."</td><td>".$row["facilities"]."</td><td>".$row["guests"]."</td><td>".$row["price"]."</td></tr>";
      }

      echo "</table>";
    } else {
      echo "No rooms found.";
    }
  }

  $con->close();
  ?>
</body>
</html>
