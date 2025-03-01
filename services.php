<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: lightgreen;
        }
        .service-row {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 15px;
        }
        .service-row span {
            margin-right: 10px; /* Adjust this value to reduce/increase spacing */
            width: 200px;
        }
        .btn-custom {
            background-color: blue;
            color: white;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Additional Services</h1>
        <p>Would you like to receive our additional services? If so, please sign up:</p>
        <div class="service-row">
            <span>1. Spa Treatment</span>
            <a href="spatreatment.php" class="btn btn-custom">Spa Treatment</a>
        </div>
        <div class="service-row">
            <span>2. GYM</span>
            <a href="gym.php" class="btn btn-custom">GYM</a>
        </div>
        <div class="service-row">
            <span>3. Laundry</span>
            <a href="laundry.php" class="btn btn-custom">Laundry</a>
        </div>
        <div class="service-row">
            <span>4. Parking</span>
            <a href="parking.php" class="btn btn-custom">Parking</a>
        </div>
        <div class="service-row">
            <span>5. Transportation</span>
            <a href="transportation.php" class="btn btn-custom">Transportation</a>
        </div>
        <div class="service-row">
            <span>6. Outdoor Activities</span>
            <a href="OutdoorActivities.php" class="btn btn-custom">Outdoor Activities</a>
        </div>
        <a href="index.php" class="btn btn-primary mt-3">Back to Homepage</a>
        <a href="ViewServiceCharge.php" class="btn btn-primary mt-3">View Service Charges</a>
    </div>
</body>
</html>
