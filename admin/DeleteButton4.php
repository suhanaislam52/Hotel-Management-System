<?php

require('inc/db_config.php');

if (isset($_POST['staff_id'])) {
    
    $staffId = filter_input(INPUT_POST, 'staff_id', FILTER_SANITIZE_NUMBER_INT);

    
    $sql = "DELETE FROM frontdeskstaff WHERE ID = ?";

    if ($stmt = $con->prepare($sql)) {
        
        $stmt->bind_param("i", $staffId);

        
        if ($stmt->execute()) {

            header("Location: DeleteFrontDesk.php?delete=success");
            exit();
        } else {
            
            echo "Error: Unable to delete staff. Please try again later.";
        }

        
        $stmt->close();
    } else {
        
        echo "Error: Unable to prepare the delete statement.";
    }
}


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
