<?php
require('inc/essentials.php');
require('inc/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $product_name = filter_input(INPUT_POST, 'Product_Name', FILTER_SANITIZE_STRING);
    $stock_left = filter_input(INPUT_POST, 'Stock_Left', FILTER_SANITIZE_STRING);
    $restocked_date = $_POST['Restocked_Date'];

    
    $sql = "INSERT INTO `List_of_Hotel_Inventory` (Name__Products, Stock_Left, Restocked_Date) 
            VALUES (?, ?, ?)";
    $values = array($product_name, $stock_left, $restocked_date);
    $datatypes = "sss";

    $result = execute_query($sql, $values, $datatypes, $hname, $uname, $pass, $db); 

    if ($result) {
        echo "Inventory added successfully!";
    } else {
        echo "Failed to add inventory.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory</title>
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
    <h2 style="text-align: center;">Add Inventory</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="Product_Name">Product Name:</label>
        <input type="text" name="Product_Name" required>

        <label for="Stock_Left">Stock Left:</label>
        <input type="text" name="Stock_Left" required>

        <label for="Restocked_Date">Restocked Date:</label>
        <input type="date" name="Restocked_Date" required>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
