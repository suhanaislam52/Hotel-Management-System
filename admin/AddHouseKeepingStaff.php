<?php
   require('inc/essentials.php');
   require('inc/db_config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $phone_no = filter_input(INPUT_POST, 'phone_no', FILTER_SANITIZE_STRING);
    $gender = $_POST['gender'];
    $nid = filter_input(INPUT_POST, 'nid', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $room_number = filter_input(INPUT_POST, 'room_number', FILTER_SANITIZE_NUMBER_INT);
    $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
    $shift_schedule = filter_input(INPUT_POST, 'shift_schedule', FILTER_SANITIZE_STRING);
    $employment_status = filter_input(INPUT_POST, 'employment_status', FILTER_SANITIZE_STRING);
    $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_STRING);
    $date_of_hire = $_POST['date_of_hire'];
    $qualifications = filter_input(INPUT_POST, 'qualifications', FILTER_SANITIZE_STRING);

    
    $sql = "INSERT INTO HouseKeepingStaff (first_name, last_name, phone_no, gender, nid, address, room_number, position, Shift_Schedule, Employment_Status, Salary, Date_of_Hire, Qualifications) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $values = array($first_name, $last_name, $phone_no, $gender, $nid, $address, $room_number, $position, $shift_schedule, $employment_status, $salary, $date_of_hire, $qualifications);
    $datatypes = "ssssssissssss";

    $result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db); 

    if ($result) {
        echo "Housekeeping staff added successfully!";
    } else {
        echo "Failed to add housekeeping staff.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Housekeeping Staff</title>
    <style>
        body {
            
            background: linear-gradient(to bottom, #0074D9, #ADFF2F);
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
        input[type="date"],
        select {
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
    <h2 style="text-align: center;">Add Housekeeping Staff</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="phone_no">Phone Number:</label>
        <input type="text" name="phone_no" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="nid">NID:</label>
        <input type="text" name="nid" required>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="room_number">Room Number:</label>
        <input type="number" name="room_number" required>

        <label for="position">Position:</label>
        <input type="text" name="position" required>

        <label for="shift_schedule">Shift Schedule:</label>
        <input type="text" name="shift_schedule" required>

        <label for="employment_status">Employment Status:</label>
        <input type="text" name="employment_status" required>

        <label for="salary">Salary:</label>
        <input type="text" name="salary" required>

        <label for="date_of_hire">Date of Hire:</label>
        <input type="date" name="date_of_hire" required>

        <label for="qualifications">Qualifications:</label>
        <input type="text" name="qualifications" required>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
