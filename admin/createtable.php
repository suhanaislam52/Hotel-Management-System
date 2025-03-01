<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'hbwebsite';

$con = mysqli_connect($hname, $uname, $pass, $db);

if (!$con) {
    die("Cannot Connect to Database" . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS `HouseKeepingStaff` (
    `ID` INT AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(50) NOT NULL,
    `last_name` VARCHAR(50) NOT NULL,
    `phone_no` VARCHAR(20) NOT NULL,
    `gender` ENUM('Male', 'Female', 'Other') NOT NULL,
    `nid` VARCHAR(20) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `room_number` INT(100) NOT NULL,
    `position` VARCHAR(50) NOT NULL,
    `Shift_Schedule` VARCHAR(50) NOT NULL,
    `Employment_Status` VARCHAR(50) NOT NULL,
    `Salary` VARCHAR(50) NOT NULL,
    `Date_of_Hire` VARCHAR(50) NOT NULL,
    `Qualifications` VARCHAR(50) NOT NULL
)";

if (mysqli_query($con, $sql)) {
    echo "Table created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($con);
}

mysqli_close($con);
?>
