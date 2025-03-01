<?php

require('inc/essentials.php');
require('inc/db_config.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['room'] as $roomId => $roomData) {
        $id = $roomData['id'];
        $name = filteration($roomData['name']);
        $image = filteration($roomData['image']);
        $features = filteration($roomData['features']);
        $facilities = filteration($roomData['facilities']);
        $guests = filteration($roomData['guests']);
        $price = filteration($roomData['price']);

        $sql = "UPDATE rooms SET name=?, image=?, features=?, facilities=?, guests=?, price=? WHERE id=?";
        $values = array($name, $image, $features, $facilities, $guests, $price, $id);
        $datatypes = "ssssssd"; 
        $result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db);

        if ($result) {
            echo "Room with ID $id updated successfully.<br>";
        } else {
            echo "Error updating room with ID $id.<br>";
        }
    }
}

$sql = "SELECT * FROM rooms";
$result = select($sql, [], ""); // Assuming no parameters are used in the SELECT query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Rooms</title>
</head>
<body>
    <h1>Manage Rooms</h1>

    <form method="post">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <fieldset>
                <legend>Room <?php echo $row['id']; ?></legend>
                <input type="hidden" name="room[<?php echo $row['id']; ?>][id]" value="<?php echo $row['id']; ?>">
                <label>Name:</label>
                <input type="text" name="room[<?php echo $row['id']; ?>][name]" value="<?php echo $row['name']; ?>"><br>
                <label>Image:</label>
                <input type="text" name="room[<?php echo $row['id']; ?>][image]" value="<?php echo $row['image']; ?>"><br>
                <label>Features:</label>
                <input type="text" name="room[<?php echo $row['id']; ?>][features]" value="<?php echo $row['features']; ?>"><br>
                <label>Facilities:</label>
                <input type="text" name="room[<?php echo $row['id']; ?>][facilities]" value="<?php echo $row['facilities']; ?>"><br>
                <label>Guests:</label>
                <input type="text" name="room[<?php echo $row['id']; ?>][guests]" value="<?php echo $row['guests']; ?>"><br>
                <label>Price:</label>
                <input type="text" name="room[<?php echo $row['id']; ?>][price]" value="<?php echo $row['price']; ?>"><br>
            </fieldset>
            <?php
        }
        ?>
        <input type="submit" value="Update Rooms">
    </form>
</body>
</html>
