<?php
require('inc/essentials.php');
require('inc/db_config.php');

// Initialize variables
$first_name = $last_name = $phone_no = $gender = $nid = $address = $room_number = $position = $shift_schedule = $employment_status = $salary = $date_of_hire = $qualifications = "";
$staff_id = 0;

// Check if form is submitted for selecting a staff to update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select_staff'])) {
    $staff_name = $_POST['staff_name'];

    // Splitting the full name into first name and last name
    $names = explode(' ', $staff_name);
    $first_name = $names[0];
    $last_name = $names[count($names) - 1];

    // Fetch staff details based on the selected staff name
    $sql = "SELECT * FROM `housekeepingstaff` WHERE first_name = ? AND last_name = ?";
    $values = array($first_name, $last_name);
    $datatypes = "ss";

    $result = select($sql, $values, $datatypes);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $staff_id = $row['ID'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $phone_no = $row['phone_no'];
        $gender = $row['gender'];
        $nid = $row['nid'];
        $address = $row['address'];
        $room_number = $row['room_number'];
        $position = $row['position'];
        $shift_schedule = $row['Shift_Schedule'];
        $employment_status = $row['Employment_Status'];
        $salary = $row['Salary'];
        $date_of_hire = $row['Date_of_Hire'];
        $qualifications = $row['Qualifications'];
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
    $phone_no = filter_input(INPUT_POST, 'Phone_No', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'Gender', FILTER_SANITIZE_STRING);
    $nid = filter_input(INPUT_POST, 'NID', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'Address', FILTER_SANITIZE_STRING);
    $room_number = filter_input(INPUT_POST, 'Room_Number', FILTER_SANITIZE_STRING);
    $position = filter_input(INPUT_POST, 'Position', FILTER_SANITIZE_STRING);
    $shift_schedule = filter_input(INPUT_POST, 'Shift_Schedule', FILTER_SANITIZE_STRING);
    $employment_status = filter_input(INPUT_POST, 'Employment_Status', FILTER_SANITIZE_STRING);
    $salary = filter_input(INPUT_POST, 'Salary', FILTER_SANITIZE_STRING);
    $date_of_hire = filter_input(INPUT_POST, 'Date_of_Hire', FILTER_SANITIZE_STRING);
    $qualifications = filter_input(INPUT_POST, 'Qualifications', FILTER_SANITIZE_STRING);

    // Update the staff details in the database
    $sql = "UPDATE `housekeepingstaff` SET first_name = ?, last_name = ?, phone_no = ?, gender = ?, nid = ?, address = ?, room_number = ?, position = ?, Shift_Schedule = ?, Employment_Status = ?, Salary = ?, Date_of_Hire = ?, Qualifications = ? WHERE ID = ?";
    $values = array($first_name, $last_name, $phone_no, $gender, $nid, $address, $room_number, $position, $shift_schedule, $employment_status, $salary, $date_of_hire, $qualifications, $staff_id);
    $datatypes = "sssssssssssdsi";

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
    <title>Update Housekeeping Staff</title>
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
        input[type="email"],
        input[type="tel"],
        input[type="date"],
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
    <h2 style="text-align: center;">Update Housekeeping Staff</h2>

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

            <label for="Phone_No">Phone Number:</label>
            <input type="tel" name="Phone_No" value="<?php echo htmlspecialchars($phone_no); ?>" required>

            <label for="Gender">Gender:</label>
            <input type="text" name="Gender" value="<?php echo htmlspecialchars($gender); ?>" required>

            <label for="NID">NID:</label>
            <input type="text" name="NID" value="<?php echo htmlspecialchars($nid); ?>" required>

            <label for="Address">Address:</label>
            <textarea name="Address" required><?php echo htmlspecialchars($address); ?></textarea>

            <label for="Room_Number">Room Number:</label>
            <input type="text" name="Room_Number" value="<?php echo htmlspecialchars($room_number); ?>" required>

            <label for="Position">Position:</label>
            <input type="text" name="Position" value="<?php echo htmlspecialchars($position); ?>" required>

            <label for="Shift_Schedule">Shift Schedule:</label>
            <input type="text" name="Shift_Schedule" value="<?php echo htmlspecialchars($shift_schedule); ?>" required>

            <label for="Employment_Status">Employment Status:</label>
            <input type="text" name="Employment_Status" value="<?php echo htmlspecialchars($employment_status); ?>" required>

            <label for="Salary">Salary:</label>
            <input type="text" name="Salary" value="<?php echo htmlspecialchars($salary); ?>" required>

            <label for="Date_of_Hire">Date of Hire:</label>
            <input type="date" name="Date_of_Hire" value="<?php echo htmlspecialchars($date_of_hire); ?>" required>

            <label for="Qualifications">Qualifications:</label>
            <textarea name="Qualifications" required><?php echo htmlspecialchars($qualifications); ?></textarea>

            <input type="submit" name="update_staff" value="Update">
        </form>
    <?php endif; ?>
</body>
</html>
