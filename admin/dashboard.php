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
    <title>Admin Panel-Dashboard</title>

    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

 <div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-8 ms-auto p-4 overflow-hidden">
             
        </div>
    </div>
 </div>

<?php require('inc/scripts.php'); ?>
    
</body>
</html>