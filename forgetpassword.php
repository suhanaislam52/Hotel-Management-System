<?php
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    $sql = "UPDATE registration_details SET Password = ? WHERE Email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $new_password, $email);

    if ($stmt->execute()) {
        $reset_message = "Password updated successfully!";
    } else {
        $reset_message = "Error updating password: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Forget Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Password</button>
        </form>
        <?php if (isset($reset_message)) : ?>
            <div class="alert alert-info mt-3"><?php echo $reset_message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
