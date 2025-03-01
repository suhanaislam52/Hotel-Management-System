<?php

$host = 'localhost'; 
$db = 'hbwebsite';
$user = 'root'; 
$pass = ''; 


$con = new mysqli($host, $user, $pass, $db);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $guestName = $_POST['guestName'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $roomId = $_POST['roomId'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['paymentMethod'];
    $specialRequests = $_POST['specialRequests'];
   
    $spaTreatment = isset($_POST['spaTreatment']) ? 'yes' : 'no';
    $gym = isset($_POST['gym']) ? 'yes' : 'no';
    $laundry = isset($_POST['laundry']) ? 'yes' : 'no';
    $parking = isset($_POST['parking']) ? 'yes' : 'no';
    $transportation = isset($_POST['transportation']) ? 'yes' : 'no';
    $outdoorActivities = isset($_POST['outdoorActivities']) ? 'yes' : 'no';

    
   
$sql_check = "SELECT * FROM finalbooking WHERE roomId = ? AND check_in_date = ?";
$stmt_check = $con->prepare($sql_check);
if ($stmt_check) {
    $stmt_check->bind_param("ss", $roomId, $check_in_date);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        
        $availability_message = "The room is not available for the selected check-in date.";
        $booking_saved = false;
    } else {
      
        $availability_message = "The room is available for booking.";
        
       
        $sql_save = "INSERT INTO finalbooking (guestName, check_in_date, check_out_date, roomId, email, phone, address, paymentMethod, specialRequests, spaTreatment, gym, laundry, parking, transportation, outdoorActivities) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_save = $con->prepare($sql_save);
        if ($stmt_save) {
            $stmt_save->bind_param("sssssssssssssss", $guestName, $check_in_date, $check_out_date, $roomId, $email, $phone, $address, $paymentMethod, $specialRequests, $spaTreatment, $gym, $laundry, $parking, $transportation, $outdoorActivities);
            $stmt_save->execute();
            $booking_saved = true;
        } else {
           
            echo "Error: " . $con->error;
        }
    }

    $stmt_check->close();
} else {
   
    echo "Error: " . $con->error;
}


if ($stmt_save) {
    $stmt_save->close();
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            
            background-color: #ff8080;

           
            background-image: linear-gradient(135deg, #ff8080 0%, #ffd1d1 100%);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Book a Room</h1>
        <?php if(isset($availability_message)) : ?>
            <div class="alert alert-<?php echo $booking_saved ? 'success' : 'danger'; ?>">
                <?php echo $availability_message; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="guestName" class="form-label">Guest Name:</label>
                <input type="text" class="form-control" id="guestName" name="guestName" required>
            </div>
            <div class="mb-3">
                <label for="check_in_date" class="form-label">Check-in Date:</label>
                <input type="date" class="form-control" id="check_in_date" name="check_in_date" required>
            </div>
            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-out Date:</label>
                <input type="date" class="form-control" id="check_out_date" name="check_out_date" required>
            </div>
            <div class="mb-3">
                <label for="roomId" class="form-label">Room:</label>
                <select class="form-select" id="roomId" name="roomId" required>
                    <option value="">Select Room</option>
                    <option value="Simple Room">Simple Room</option>
                    <option value="Single Room">Single Room</option>
                    <option value="Double Room">Double Room</option>
                    <option value="Deluxe Room">Deluxe Room</option>
                    <option value="Presidential Suite">Presidential Suite</option>
                    <option value="PentHouse Suite">PentHouse Suite</option>
                    <option value="Pool Villa">Pool Villa</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
               
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="paymentMethod" class="form-label">Payment Method:</label>
                <select class="form-select" id="paymentMethod" name="paymentMethod" required>
                    <option value="">Select Payment Method</option>
                    <option value="creditcard">Credit Card</option>
                    <option value="debitcard">Debit Card</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="specialRequests" class="form-label">Special Requests:</label>
                <textarea class="form-control" id="specialRequests" name="specialRequests" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-check-label">Additional Services:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="spaTreatment" name="spaTreatment">
                    <label class="form-check-label" for="spaTreatment">Spa Treatment</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gym" name="gym">
                    <label class="form-check-label" for="gym">Gym</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="laundry" name="laundry">
                    <label class="form-check-label" for="laundry">Laundry</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="parking" name="parking">
                    <label class="form-check-label" for="parking">Parking</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="transportation" name="transportation">
                    <label class="form-check-label" for="transportation">Transportation</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="outdoorActivities" name="outdoorActivities">
                    <label class="form-check-label" for="outdoorActivities">Outdoor Activities</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Booking Details</button>
           
            <a href="payment.php" class="btn btn-secondary">Proceed to Payment</a>
        </form>
    </div>
</body>
</html>

<?php

$con->close();
?>
