<?php

    require('inc/db_config.php');


$searchResults = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $searchTerm = filter_input(INPUT_POST, 'searchTerm', FILTER_SANITIZE_STRING);
    $searchTermId = filter_input(INPUT_POST, 'searchTermId', FILTER_SANITIZE_NUMBER_INT);

    
    $sql = "SELECT * FROM hotelstaff WHERE 
                CONCAT(`first_name`, ' ', `last_name`) LIKE '%$searchTerm%' OR
                `ID` = $searchTermId";

    
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
    <title>Search Hotel Staff</title>

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
    <h2>Search Hotel Staff</h2>
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
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Department</th>
                <th>Salary</th>
                <th>In Charge Of</th>
            </tr>
            <?php foreach ($searchResults as $staff): ?>
                <tr>
                    <td><?php echo $staff['ID']; ?></td>
                    <td><?php echo $staff['first_name']; ?></td>
                    <td><?php echo $staff['last_name']; ?></td>
                    <td><?php echo $staff['Phone_number']; ?></td>
                    <td><?php echo $staff['Gender']; ?></td>
                    <td><?php echo $staff['Address']; ?></td>
                    <td><?php echo $staff['Department']; ?></td>
                    <td><?php echo $staff['Salary']; ?></td>
                    <td><?php echo $staff['In_Charge_of']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
