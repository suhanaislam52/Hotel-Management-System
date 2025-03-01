<?php

   require('inc/db_config.php');


$searchResults = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchTerm = filter_input(INPUT_POST, 'searchTerm', FILTER_SANITIZE_STRING);
    $searchTermId = filter_input(INPUT_POST, 'searchTermId', FILTER_SANITIZE_NUMBER_INT);

    
    $sql = "SELECT * FROM `Guest List` WHERE 
                CONCAT(`first_name`, ' ', `last_name`) LIKE '%$searchTerm%' OR
                `guest_id` = $searchTermId";

    
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
    <title>Search Guests</title>

    <style>
        body {
            background-color: #ffe6e6; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            vertical-align: top; 
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            padding: 10px; 
        }
    </style>
</head>
<body>
    <h2>Search Guests</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="searchTerm">Search by Name:</label>
        <input type="text" name="searchTerm" required>
        <label for="searchTermId">Search by ID:</label>
        <input type="number" name="searchTermId" required>
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
                <th>address</th>
                <th>check_in_date</th>
                <th>check_out_date</th>
                <th>payment_status</th>
                
            </tr>
            <?php foreach ($searchResults as $guest): ?>
                <tr>
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
                    
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
