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
    <title>Hotel Staff List</title>
    <?php require('inc/db_config.php'); ?>
    <style>
        
        body {
            background-color: #03fcf8; 
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
        <button onclick="location.href='ViewHotelStaff.php'">1.View Hotel Staff Guests</button>
       

        <button onclick="location.href='AddHotelStaff.php'">2.Add a Hotel Staff</button>


        <button onclick="location.href='SearchHotelStaff.php'">3.Search</button>

        <button onclick="location.href='UpdateHotelStaff.php'">4.Update Hotel Staff</button>
        
        <button onclick="location.href='DeleteHotelStaff.php'">5.Delete</button>
       
    </div>
</body>
</html>
