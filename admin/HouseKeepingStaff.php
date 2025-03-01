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
            background-color: #fc03fc; 
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
        <button onclick="location.href='ViewHouseKeepingStaff.php'">1.View HouseKeeping Staff</button>
       

        <button onclick="location.href='AddHouseKeepingStaff.php'">2.Add a  HouseKepping Staff</button>


        <button onclick="location.href='SearchHouseKeepingStaff.php'">3.Search</button>
        

        <button onclick="location.href='UpdateHouseKeepingInformation.php'">4.Update HouseKeeping Staff Information</button>

        
        <button onclick="location.href='DeleteHouseKeepingStaff.php'">5.Delete</button>
       
    </div>
</body>
</html>
