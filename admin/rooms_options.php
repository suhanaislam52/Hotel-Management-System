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
            background-color: #f59842; 
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
        <button onclick="location.href='ViewRooms.php'">1.View Rooms</button>
       

        <button onclick="location.href='AddRooms.php'">2.Add a  Room</button>


        <button onclick="location.href='UpdateRooms.php'">3.Update Room Information</button>
        
        
       
    </div>
</body>
</html>
