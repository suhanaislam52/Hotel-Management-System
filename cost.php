<?php

$host = 'localhost'; 
$db = 'hbwebsite'; 
$user = 'root'; 
$pass = '';

$con = new mysqli($host, $user, $pass, $db);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


function calculateTotalCost($roomPrice, $serviceCharges) {
    return $roomPrice + array_sum($serviceCharges);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $guestName = $_POST['guestName'];

    
    $sql_booking_details = "SELECT * FROM finalbooking WHERE guestName = ?";
    $stmt_booking_details = $con->prepare($sql_booking_details);
    $stmt_booking_details->bind_param("s", $guestName);
    $stmt_booking_details->execute();
    $result_booking_details = $stmt_booking_details->get_result();
    
    if ($result_booking_details->num_rows > 0) {
      
        $row_booking_details = $result_booking_details->fetch_assoc();

        
        $roomId = $row_booking_details['roomId'];
        $sql_room_price = "SELECT price FROM rooms WHERE id = ?";
        $stmt_room_price = $con->prepare($sql_room_price);
        $stmt_room_price->bind_param("i", $roomId);
        $stmt_room_price->execute();
        $result_room_price = $stmt_room_price->get_result();
        $roomPrice = 0;
        if ($result_room_price->num_rows > 0) {
            $row_room_price = $result_room_price->fetch_assoc();
            $roomPrice = $row_room_price['price'];
        }

        echo "Debug: Room Price = $" . $roomPrice . "<br>";

        
        $services = ['spaTreatment', 'gym', 'laundry', 'parking', 'transportation', 'outdoorActivities'];
        $serviceCharges = [];
        foreach ($services as $service) {
            if ($row_booking_details[$service] == 'Yes') {
                $sql_service_price = "SELECT price FROM service_charge WHERE service = ?";
                $stmt_service_price = $con->prepare($sql_service_price);
                $stmt_service_price->bind_param("s", $service);
                $stmt_service_price->execute();
                $result_service_price = $stmt_service_price->get_result();
                if ($result_service_price->num_rows > 0) {
                    $row_service_price = $result_service_price->fetch_assoc();
                    $serviceCharges[$service] = $row_service_price['price'];
                    echo "Debug: " . $service . " Price = $" . $row_service_price['price'] . "<br>";
                }
            }
        }

        
        $totalCost = calculateTotalCost($roomPrice, $serviceCharges);

       
        echo "Total Cost: $" . number_format($totalCost, 2);
    } else {
        echo "Guest not found.";
    }

   
    $stmt_booking_details->close();
    $stmt_room_price->close();
}


$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Cost Calculation</title>
</head>
<body>
    <h1>Calculate Total Cost</h1>
    <form method="post" action="">
        <label for="guestName">Enter Guest Name:</label>
        <input type="text" id="guestName" name="guestName" required>
        <button type="submit">Calculate Total Cost</button>
    </form>
</body>
</html>
