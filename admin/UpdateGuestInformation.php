<?php

require('inc/db_config.php');

$searchResults = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = filter_input(INPUT_POST, 'searchTerm', FILTER_SANITIZE_STRING);
    $searchTermId = filter_input(INPUT_POST, 'searchTermId', FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM `Guest List` WHERE 1=1"; // Initializing with a valid SQL statement

    // Append conditions to the SQL query based on input
    if (!empty($searchTerm)) {
        $sql .= " AND CONCAT(`first_name`, ' ', `last_name`) LIKE '%$searchTerm%'";
    }
    if (!empty($searchTermId)) {
        $sql .= " AND `guest_id` = $searchTermId";
    }

    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Guest Information</title>
    <style>
        body {
            background-color: #E0F7FA; /* Light blue background */
            font-family: Arial, sans-serif;
        }

        form {
            display: flex;
            flex-direction: column; /* Arrange elements one below another */
            width: 300px; /* Fixed width for the form */
            margin: 0 auto; /* Center the form horizontally */
        }

        label, input, button {
            margin-bottom: 10px; /* Space between elements */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Update Guest Information</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="searchTerm">Search by Name:</label>
        <input type="text" name="searchTerm">
        <label for="searchTermId">Search by ID:</label>
        <input type="number" name="searchTermId">
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($searchResults)): ?>
        <h3>Search Results:</h3>
        <table>
            <tr>
                <th>Guest ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>NID</th>
                <th>Address</th>
                <th>Check In Date</th>
                <th>Check Out Date</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
            <?php foreach ($searchResults as $guest): ?>
                <tr>
                    <form method="post" action="EditInformation.php">
                        <td><?php echo $guest['guest_id']; ?></td>
                        <td><?php echo $guest['first_name']; ?></td>
                        <td><?php echo $guest['last_name']; ?></td>
                        <td><?php echo $guest['email']; ?></td>
                        <td><?php echo $guest['phone_no']; ?></td>
                        <td><?php echo $guest['gender']; ?></td>
                        <td><?php echo $guest['NID']; ?></td>
                        <td><?php echo $guest['address']; ?></td>
                        <td><?php echo $guest['check_in_date']; ?></td>
                        <td><?php echo $guest['check_out_date']; ?></td>
                        <td><?php echo $guest['payment_status']; ?></td>
                        <input type="hidden" name="guest_id" value="<?php echo $guest['guest_id']; ?>">
                        <td><button type="submit">Edit</button></td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
