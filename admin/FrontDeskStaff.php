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
    <title>Front Desk Staff List</title>
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
        <button onclick="location.href='ViewFrontDeskStaff.php'">1.View Existing FrontDeskStaff</button>
       

        <button onclick="location.href='AddFrontDeskStaff.php'">2.Add a  FrontDeskStaff</button>


        <button onclick="location.href='SearchFrontDeskStaff.php'">3.Search</button>

        <button onclick="location.href='UpdateFrontDeskStaff.php'">4.Update Front Desk Staff</button>
        
        
        <button onclick="location.href='DeleteFrontDesk.php'">4.Delete</button>
       
    </div>
</body>
</html>
