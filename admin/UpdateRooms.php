<?php
require('inc/essentials.php');
require('inc/db_config.php');

// Initialize variables
$room_name = $room_image = $room_features = $room_facilities = $room_guests = $room_price = "";
$room_id = 0;

// Check if form is submitted for selecting a room to update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select_room'])) {
    $room_type = $_POST['room_type'];

    // Fetch room details based on the selected room type
    $sql = "SELECT * FROM `rooms` WHERE name = ?";
    $values = array($room_type);
    $datatypes = "s";

    $result = select($sql, $values, $datatypes);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $room_id = $row['id'];
        $room_name = $row['name'];
        $room_image = $row['image'];
        $room_features = $row['features'];
        $room_facilities = $row['facilities'];
        $room_guests = $row['guests'];
        $room_price = $row['price'];
    } else {
        echo "Room not found.";
        exit; 
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_room'])) {
    $room_id = $_POST['room_id'];
    $room_name = filter_input(INPUT_POST, 'Room_Name', FILTER_SANITIZE_STRING);
    $room_features = filter_input(INPUT_POST, 'Room_Features', FILTER_SANITIZE_STRING);
    $room_facilities = filter_input(INPUT_POST, 'Room_Facilities', FILTER_SANITIZE_STRING);
    $room_guests = filter_input(INPUT_POST, 'Room_Guests', FILTER_SANITIZE_STRING);
    $room_price = filter_input(INPUT_POST, 'Room_Price', FILTER_SANITIZE_STRING);

    // Update the room details in the database
    $sql = "UPDATE `rooms` SET name = ?, features = ?, facilities = ?, guests = ?, price = ? WHERE id = ?";
    $values = array($room_name, $room_features, $room_facilities, $room_guests, $room_price, $room_id);
    $datatypes = "sssssi";

    $update_result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db);

    if ($update_result) {
        echo "Room updated successfully!";
    } else {
        echo "Failed to update room.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Room</title>
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
    </style>
</head>
<body>
    <h2 style="text-align: center;">Update Room</h2>

    <!-- Form to select room type -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="room_type">Select Room to Update:</label>
        <select name="room_type" required>
            <option value="Simple Room">Simple Room</option>
            <option value="Single Room">Single Room</option>
            <option value="Double Room">Double Room</option>
            <option value="Deluxe Room">Deluxe Room</option>
            <option value="Presidential Suite">Presidential Suite</option>
            <option value="Penthouse Suite">Penthouse Suite</option>
            <option value="Pool Villa">Pool Villa</option>
            <option value="ggg">ggg</option>
        </select>
        <input type="submit" name="select_room" value="Select Room">
    </form>

    <?php if (!empty($room_name)): ?>
        <!-- Display form with pre-filled room details -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">

            <label for="Room_Name">Room Name:</label>
            <input type="text" name="Room_Name" value="<?php echo htmlspecialchars($room_name); ?>" required>

            <label for="Room_Image">Room Image:</label>
            <img src="<?php echo htmlspecialchars($room_image); ?>" alt="Room Image">

            <label for="Room_Features">Room Features:</label>
            <textarea name="Room_Features" required><?php echo htmlspecialchars($room_features); ?></textarea>

            <label for="Room_Facilities">Room Facilities:</label>
            <textarea name="Room_Facilities" required><?php echo htmlspecialchars($room_facilities); ?></textarea>

            <label for="Room_Guests">Maximum Guests:</label>
            <input type="text" name="Room_Guests" value="<?php echo htmlspecialchars($room_guests); ?>" required>

            <label for="Room_Price">Price per Night:</label>
            <input type="text" name="Room_Price" value="<?php echo htmlspecialchars($room_price); ?>" required>
            
            <input type="submit" name="update_room" value="Update">
        </form>
    <?php endif; ?>
</body>
</html>
