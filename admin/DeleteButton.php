<?php

  require('inc/db_config.php');


if (isset($_POST['guest_id'])) {
   
    $guest_id = $_POST['guest_id'];

    
    $sql = "DELETE FROM `Guest List` WHERE guest_id = ?";

    
    $stmt = $con->prepare($sql);

    
    $stmt->bind_param('i', $guest_id);

    
    if ($stmt->execute()) {
        
        header("Location: DeleteGuest.php?delete=success");
        exit();
    } else {
       
        header("Location: DeleteGuest.php?delete=error");
        exit();
    }
}


$stmt->close();


$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <style>
        body {
            background-color: #ffe6e6; 
        }
        .message {
            text-align: center;
            margin-top: 50px;
            font-size: 24px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="message">DELETION SUCCESSFUL</div>
</body>
</html>
