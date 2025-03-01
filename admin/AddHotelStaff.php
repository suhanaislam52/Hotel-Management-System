<?php
    require('inc/essentials.php');
    require('inc/db_config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $phone_number = filter_input(INPUT_POST, 'Phone_number', FILTER_SANITIZE_STRING);
        $gender = $_POST['Gender'];
        $address = filter_input(INPUT_POST, 'Address', FILTER_SANITIZE_STRING);
        $department = filter_input(INPUT_POST, 'Department', FILTER_SANITIZE_STRING);
        $salary = $_POST['Salary'];
        $in_charge_of = filter_input(INPUT_POST, 'In_Charge_of', FILTER_SANITIZE_STRING);

        
        $sql = "INSERT INTO hotelstaff (first_name, last_name, Phone_number, Gender, Address, Department, Salary, In_Charge_of) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $values = array($first_name, $last_name, $phone_number, $gender, $address, $department, $salary, $in_charge_of);
        $datatypes = "ssssssss";

        $result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db); 

        if ($result) {
            echo "Staff member added successfully!";
        } else {
            echo "Failed to add staff member.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel Staff</title>
    <style>
        body {
            background: linear-gradient(to bottom, #eaed1f, #eaed1f);
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
    <h2 style="text-align: center;">Add Hotel Staff</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="Phone_number">Phone Number:</label>
        <input type="text" name="Phone_number" required>

        <label for="Gender">Gender:</label>
        <select name="Gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="Address">Address:</label>
        <input type="text" name="Address" required>

        <label for="Department">Department:</label>
        <input type="text" name="Department" required>

        <label for="Salary">Salary:</label>
        <input type="text" name="Salary" required>

        <label for="In_Charge_of">In Charge Of:</label>
        <input type="text" name="In_Charge_of" required>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
