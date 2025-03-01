<?php
require('inc/essentials.php');
require('inc/db_config.php');

// Initialize variables
$first_name = $last_name = $email = $phone_no = $gender = $NID = $address = $check_in_date = $check_out_date = $payment_status = "";
$guest_id = 0;

// Check if form is submitted for selecting a guest to update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select_guest'])) {
    $guest_name = $_POST['guest_name'];

    // Splitting the full name into first name and last name
    $names = explode(' ', $guest_name);
    $first_name = $names[0];
    $last_name = $names[count($names) - 1];

    // Fetch guest details based on the selected guest name
    $sql = "SELECT * FROM `guest list` WHERE first_name = ? AND last_name = ?";
    $values = array($first_name, $last_name);
    $datatypes = "ss";

    $result = select($sql, $values, $datatypes);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $guest_id = $row['guest_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $phone_no = $row['phone_no'];
        $gender = $row['gender'];
        $NID = $row['NID'];
        $address = $row['address'];
        $check_in_date = $row['check_in_date'];
        $check_out_date = $row['check_out_date'];
        $payment_status = $row['payment_status'];
    } else {
        echo "Guest not found.";
        exit; // Stop further execution if guest not found
    }
}

// Handle form submission for updating guest details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_guest'])) {
    $guest_id = $_POST['guest_id'];
    $first_name = filter_input(INPUT_POST, 'First_Name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'Last_Name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
    $phone_no = filter_input(INPUT_POST, 'Phone_No', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'Gender', FILTER_SANITIZE_STRING);
    $NID = filter_input(INPUT_POST, 'NID', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'Address', FILTER_SANITIZE_STRING);
    $check_in_date = filter_input(INPUT_POST, 'Check_In_Date', FILTER_SANITIZE_STRING);
    $check_out_date = filter_input(INPUT_POST, 'Check_Out_Date', FILTER_SANITIZE_STRING);
    $payment_status = filter_input(INPUT_POST, 'Payment_Status', FILTER_SANITIZE_STRING);

    // Update the guest details in the database
    $sql = "UPDATE `guest list` SET first_name = ?, last_name = ?, email = ?, phone_no = ?, gender = ?, NID = ?, address = ?, check_in_date = ?, check_out_date = ?, payment_status = ? WHERE guest_id = ?";
    $values = array($first_name, $last_name, $email, $phone_no, $gender, $NID, $address, $check_in_date, $check_out_date, $payment_status, $guest_id);
    $datatypes = "ssssssssssi";

    $update_result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db);

    if ($update_result) {
        echo "Guest updated successfully!";
    } else {
        echo "Failed to update guest.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Guest</title>
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
    <h2 style="text-align: center;">Update Guest</h2>

    <!-- Form to select guest by name -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="guest_name">Select Guest to Update (by Full Name):</label>
        <input type="text" name="guest_name" required>
        <input type="submit" name="select_guest" value="Select Guest">
    </form>

    <?php if (!empty($first_name)): ?>
        <!-- Display form with pre-filled guest details -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="guest_id" value="<?php echo $guest_id; ?>">

            <label for="First_Name">First Name:</label>
            <input type="text" name="First_Name" value="<?php echo htmlspecialchars($first_name); ?>" required>

            <label for="Last_Name">Last Name:</label>
            <input type="text" name="Last_Name" value="<?php echo htmlspecialchars($last_name); ?>" required>

            <label for="Email">Email:</label>
            <input type="email" name="Email" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="Phone_No">Phone Number:</label>
            <input type="tel" name="Phone_No" value="<?php echo htmlspecialchars($phone_no); ?>" required>

            <label for="Gender">Gender:</label>
            <input type="text" name="Gender" value="<?php echo htmlspecialchars($gender); ?>" required>

            <label for="NID">NID:</label>
            <input type="text" name="NID" value="<?php echo htmlspecialchars($NID); ?>" required>

            <label for="Address">Address:</label>
            <textarea name="Address" required><?php echo htmlspecialchars($address); ?></textarea>

            <label for="Check_In_Date">Check-In Date:</label>
            <input type="date" name="Check_In_Date" value="<?php echo htmlspecialchars($check_in_date); ?>" required>

            <label for="Check_Out_Date">Check-Out Date:</label>
            <input type="date"
            name="Check_Out_Date" value="<?php echo htmlspecialchars($check_out_date); ?>" required>

            <label for="Payment_Status">Payment Status:</label>
            <input type="text" name="Payment_Status" value="<?php echo htmlspecialchars($payment_status); ?>" required>

            <input type="submit" name="update_guest" value="Update">
        </form>
    <?php endif; ?>
</body>
</html>
