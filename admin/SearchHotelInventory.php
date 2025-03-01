<?php
require('inc/db_config.php');

$searchResults = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = filter_input(INPUT_POST, 'searchTerm', FILTER_SANITIZE_STRING);
    $searchTermId = filter_input(INPUT_POST, 'searchTermId', FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM `List_of_Hotel_Inventory` WHERE 
                CONCAT(`Name__Products`, ' ', `Stock_Left`) LIKE '%$searchTerm%' OR
                `serial_number` = $searchTermId";

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
    <title>Search Hotel Inventory</title>
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
    <h2>Search Hotel Inventory</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="searchTerm">Search by Product Name or Stock Left:</label>
        <input type="text" name="searchTerm" required>
        <label for="searchTermId">Search by Serial Number:</label>
        <input type="number" name="searchTermId" required>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($searchResults)): ?>
        <h3>Search Results:</h3>
        <table>
            <tr>
                <th>Serial Number</th>
                <th>Product Name</th>
                <th>Stock Left</th>
                <th>Restocked Date</th>
            </tr>
            <?php foreach ($searchResults as $item): ?>
                <tr>
                    <td><?php echo $item['serial_number']; ?></td>
                    <td><?php echo $item['Name__Products']; ?></td>
                    <td><?php echo $item['Stock_Left']; ?></td>
                    <td><?php echo $item['Restocked_Date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
