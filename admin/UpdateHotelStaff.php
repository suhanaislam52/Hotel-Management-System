<?php
require('inc/essentials.php');
require('inc/db_config.php');

// Initialize variables
$first_name = $last_name = $phone_number = $gender = $address = $department = $salary = $in_charge_of = "";
$staff_id = 0;

// Check if form is submitted for selecting a staff to update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select_staff'])) {
    $staff_name = $_POST['staff_name'];

    // Splitting the full name into first name and last name
    $names = explode(' ', $staff_name);
    $first_name = $names[0];
    $last_name = $names[count($names) - 1];

    // Fetch staff details based on the selected staff name
    $sql = "SELECT * FROM `hotelstaff` WHERE first_name = ? AND last_name = ?";
    $values = array($first_name, $last_name);
    $datatypes = "ss";

    $result = select($sql, $values, $datatypes);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $staff_id = $row['ID'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $phone_number = $row['Phone_number'];
        $gender = $row['Gender'];
        $address = $row['Address'];
        $department = $row['Department'];
        $salary = $row['Salary'];
        $in_charge_of = $row['In_Charge_of'];
    } else {
        echo "Staff not found.";
        exit; // Stop further execution if staff not found
    }
}

// Handle form submission for updating staff details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_staff'])) {
    $staff_id = $_POST['staff_id'];
    $first_name = filter_input(INPUT_POST, 'First_Name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'Last_Name', FILTER_SANITIZE_STRING);
    $phone_number = filter_input(INPUT_POST, 'Phone_number', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'Gender', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'Address', FILTER_SANITIZE_STRING);
    $department = filter_input(INPUT_POST, 'Department', FILTER_SANITIZE_STRING);
    $salary = filter_input(INPUT_POST, 'Salary', FILTER_SANITIZE_STRING);
    $in_charge_of = filter_input(INPUT_POST, 'In_Charge_of', FILTER_SANITIZE_STRING);

    // Update the staff details in the database
    $sql = "UPDATE `hotelstaff` SET first_name = ?, last_name = ?, Phone_number = ?, Gender = ?, Address = ?, Department = ?, Salary = ?, In_Charge_of = ? WHERE ID = ?";
    $values = array($first_name, $last_name, $phone_number, $gender, $address, $department, $salary, $in_charge_of, $staff_id);
    $datatypes = "sssssssii";

    $update_result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db);

    if ($update_result) {
        echo "Staff updated successfully!";
    } else {
        echo "Failed to update staff.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hotel Staff</title>
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
        input[type="tel"],
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
    <h2 style="text-align: center;">Update Hotel Staff</h2>

    <!-- Form to select staff by name -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="staff_name">Select Staff to Update (by Full Name):</label>
        <input type="text" name="staff_name" required>
        <input type="submit" name="select_staff" value="Select Staff">
    </form>

    <?php if (!empty($first_name)): ?>
        <!-- Display form with pre-filled staff details -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">

            <label for="First_Name">First Name:</label>
            <input type="text" name="First_Name" value="<?php echo htmlspecialchars($first_name); ?>" required>

            <label for="Last_Name">Last Name:</label>
            <input type="text" name="Last_Name" value="<?php echo htmlspecialchars($last_name); ?>" required>

            <label for="Phone_number">Phone Number:</label>
            <input type="tel" name="Phone_number" value="<?php echo htmlspecialchars($phone_number); ?>" required>

            <label for="Gender">Gender:</label>
            <input type="text" name="Gender" value="<?php echo htmlspecialchars($gender); ?>" required>

            <label for="Address">Address:</label>
            <textarea name="Address" required><?php echo htmlspecialchars($address); ?></textarea>

            <label for="Department">Department:</label>
            <input type="text" name="Department" value="<?php echo htmlspecialchars($department); ?>" required>

            <label for="Salary">Salary:</label>
            <input type="text" name="Salary" value="<?php echo htmlspecialchars($salary); ?>" required>

            <label for="In_Charge_of">In Charge Of:</label>
            <input type="text" name="In_Charge_of" value="<?php echo htmlspecialchars($in_charge_of); ?>" required>

            <input type="submit" name="update_staff" value="Update">
        </form>
    <?php endif; ?>
</body>
</html>
