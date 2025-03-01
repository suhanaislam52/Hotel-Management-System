<?php
   require('inc/essentials.php');
   adminLogin();
   session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Inventory List</title>
    <?php require('inc/db_config.php'); ?>
    <style>
        
        body {
            background-color: #0074D9; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        div {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        button {
            margin: 10px;
            padding: 15px 30px; 
        }
    </style>
</head>
<body>
    <div>
        <button onclick="location.href='ViewHotelInventory.php'">1.View Hotel Inventory</button>
       

        <button onclick="location.href='AddHotelInventory.php'">2.Add a  Hotel Inventory</button>


        <button onclick="location.href='SearchHotelInventory.php'">3.Search</button>
        
       
    </div>
</body>
</html>
