<?php

   require('inc/db_config.php');


if (isset($_POST['ID'])) {
    
    $ID = $_POST['ID'];

    
    $sql = "DELETE FROM `housekeepingstaff` WHERE ID = ?";

   
    $stmt = $con->prepare($sql);

    
    $stmt->bind_param('i', $ID);

    
    if ($stmt->execute()) {
        
        header("Location: DeleteHouseKeepingStaff.php?delete=success");
        exit();
    } else {
        
        header("Location: DeleteHouseKeepingStaff.php?delete=error");
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
