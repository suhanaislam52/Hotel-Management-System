<?php
require('inc/essentials.php');
require('inc/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $room_name = filter_input(INPUT_POST, 'Room_Name', FILTER_SANITIZE_STRING);
    $room_image = $_FILES['Room_Image']['name']; 
    $room_features = filter_input(INPUT_POST, 'Room_Features', FILTER_SANITIZE_STRING);
    $room_facilities = filter_input(INPUT_POST, 'Room_Facilities', FILTER_SANITIZE_STRING);
    $room_guests = filter_input(INPUT_POST, 'Room_Guests', FILTER_SANITIZE_STRING);
    $room_price = filter_input(INPUT_POST, 'Room_Price', FILTER_SANITIZE_STRING);
    
    
    $target_dir = "uploads/"; 
    
    
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); 
    }

    $target_file = $target_dir . basename($_FILES["Room_Image"]["name"]);
    move_uploaded_file($_FILES["Room_Image"]["tmp_name"], $target_file);
    
    $sql = "INSERT INTO `rooms` (name, image, features, facilities, guests, price) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $values = array($room_name, $room_image, $room_features, $room_facilities, $room_guests, $room_price);
    $datatypes = "ssssss";

    $result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db); 

    if ($result) {
        echo "Room added successfully!";
    } else {
        echo "Failed to add room.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
    <style>
        body {
            background: linear-gradient(to bottom, #7FDBFF, #7FDBFF);
        }
        
        form {
            margin: 0 auto;
            width: 50%;
        }
        
        label {
            display: block; 
            margin-bottom: 10px; 
        }
        
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
       
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
       
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #4CAF50;
            color: white;
        }
        .error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Add Room</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label for="Room_Name">Room Name:</label>
        <input type="text" name="Room_Name" required>

        <label for="Room_Image">Room Image:</label>
        <input type="file" name="Room_Image" required accept="image/*">

        <label for="Room_Features">Room Features:</label>
        <textarea name="Room_Features" required></textarea>

        <label for="Room_Facilities">Room Facilities:</label>
        <textarea name="Room_Facilities" required></textarea>

        <label for="Room_Guests">Maximum Guests:</label>
        <input type="text" name="Room_Guests" required>

        <label for="Room_Price">Price per Night:</label>
        <input type="text" name="Room_Price" required>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
