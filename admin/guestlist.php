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
    <title>Guest List</title>
    <?php require('inc/db_config.php'); ?>
    <style>
       
        body {
            background-color:   #0074D9; 
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
        <button onclick="location.href='ViewExistingGuestList.php'">1.View Existing Guests</button>
       

        <button onclick="location.href='AddGuest.php'">2.Add a  Guest</button>


        <button onclick="location.href='SearchGuest.php'">3.Search</button>
        

        <button onclick="location.href='EditInformation.php'">4.Update Guest Information</button>

        
        <button onclick="location.href='DeleteGuest.php'">5.Delete</button>
       
    </div>
</body>
</html>
