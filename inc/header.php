<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-content {
            border-radius: 10px;
        }
        .btn-register {
            background-color: #343a40;
            color: #fff;
            border: none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Sapphire Hotel</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="rooms.php">Rooms</a></li>
        <li class="nav-item">
          <a class="nav-link me-2" href="facilities.php">Facilities</a></li>
        <li class="nav-item">
          <a class="nav-link me-2" href="contact.php">Contact Us</a></li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a></li>
      </ul>
      <div class="d-flex">
        <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
        <a href="admin/index.php" class="btn btn-outline-dark shadow-none me-lg-2 me-3">Admin Login</a>
      </div>
    </div>
  </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="login.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
        <i class="bi bi-person-circle fs-3 me-2"></i>
        User Login</h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control shadow-none" name="email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-4">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control shadow-none" name="password">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
      </div>
      <div class="d-flex align-items-center justify-content-between mb-2">
    <button type="submit" class="btn btn-shadow-none">LOGIN</button>
    <a href="forgetpassword.php" class="text-secondary text-decoration-none">Forgot Password?</a>
</div>
      <div class="modal-footer">
        
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
    <form action="register.php" method="POST">
    <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-lines-fill fs-3 me-2"></i>
            User Registration
        </h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
            Note: Your details must match with your ID (NID)
        </span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 p-0">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control shadow-none" name="first_name" required>
                </div>
                <div class="col-md-6 mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control shadow-none" name="last_name" required>
          </div>
          <div class="col-md-6 p-0">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="number" class="form-control shadow-none" name="phone_number" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control shadow-none" name="gender" required>
          </div>
          <div class="col-md-6 p-1">
            <label for="nid" class="form-label">NID</label>
            <input type="number" class="form-control shadow-none" name="nid" required>
          </div>
          <div class="col-md-12 p-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control shadow-none" name="address" rows="1" required></textarea>
          </div>
          <div class="col-md-6 ps-0 mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control shadow-none" name="dob" required>
          </div>
          <div class="col-md-6 ps-0 mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control shadow-none" name="email" required>
                </div>
          <div class="col-md-6 ps-0 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control shadow-none" name="password" required>
          </div>
               
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-end">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-register">Register</button>
    </div>
</form>

    </div>
  </div> 
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
