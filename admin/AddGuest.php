<?php
require('inc/essentials.php');
require('inc/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $first_name = filter_input(INPUT_POST, 'First_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'Last_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
    $phone_no = filter_input(INPUT_POST, 'Phone_Number', FILTER_SANITIZE_STRING);
    $gender = $_POST['Gender'];
    $NID = filter_input(INPUT_POST, 'NID', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'Address', FILTER_SANITIZE_STRING);
    $check_in_date = $_POST['Check_in_Date'];
    $check_out_date = $_POST['Check_out_Date'];
    $payment_status = $_POST['Payment_Status'];

    
    $sql = "INSERT INTO `Guest List` (first_name, last_name, email, phone_no, gender, NID, address, check_in_date, check_out_date, payment_status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $values = array($first_name, $last_name, $email, $phone_no, $gender, $NID, $address, $check_in_date, $check_out_date, $payment_status);
    $datatypes = "ssssssssss";

    $result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db); 

    if ($result) {
        echo "Guest added successfully!";
    } else {
        echo "Failed to add guest.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Guest</title>
    <style>
        body {
            
            background: linear-gradient(to bottom, #0074D9, #7FDBFF);
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
    <h2 style="text-align: center;">Add Guest</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="First">First Name:</label>
        <input type="text" name="First_name" required>

        <label for="Last_name">Last Name:</label>
        <input type="text" name="Last_name" required>

        <label for="Email">Email:</label>
        <input type="text" name="Email" required>

        <label for="Phone_Number">Phone Number:</label>
        <input type="text" name="Phone_Number" required>

        <label for="Gender">Gender:</label>
        <select name="Gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="NID">NID:</label>
        <input type="text" name="NID" required>

        <label for="Address">Address:</label>
        <input type="text" name="Address" required>

        <label for="Check_in_Date">Check In Date:</label>
        <input type="date" name="Check_in_Date" required>

        <label for="Check_out_Date">Check Out Date:</label>
        <input type="date" name="Check_out_Date" required>

        <label for="Payment_Status">Payment Status:</label>
        <select name="Payment_Status" required>
            <option value="Paid">Paid</option>
            <option value="Pending">Pending</option>
        </select>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
