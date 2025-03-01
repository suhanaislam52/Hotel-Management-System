<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sapphire Hotel _HOME</title>
   

  <?php require('inc/links.php');?>
    <link
     rel="stylesheet" 
     href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
/>
    <style>
        
.availability-form{
  margin-top: -50px;
  z-index:2;
  position:relative;
}
@media screen and (max-width:575px)
{
  .availability-form{
    margin-top: 25px;
    padding: 0 35px;
  }
}

</style>

    </style>
</head>
<body class="bg-light">

<?php require('inc/header.php');?>

<!--CAROUSEL-->
<div class="container-fluid">
  <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="images/carousel/1.png" alt="Slide 1">
      </div>
      <div class="swiper-slide">
        <img src="images/carousel/2.png" alt="Slide 2">
      </div>
      <div class="swiper-slide">
        <img src="images/carousel/3.png" alt="Slide 3">
      </div>
      <div class="swiper-slide">
        <img src="images/carousel/4.png" alt="Slide 4">
      </div>
      <div class="swiper-slide">
        <img src="images/carousel/5.png" alt="Slide 5">
      </div>
      <div class="swiper-slide">
        <img src="images/carousel/6.png" alt="Slide 6">
      </div>
    </div>
  </div>
</div>
 
<!--check availability form--->
<!--
<div class="container availability-form">
  <div class="row">
    <div class="col-lg-12 bg-white p4 rounded">
      <h5 class="mb-4">Check Booking Availability</h5>
      <form >
        <div class="row align-items-end">
          <div class="col-lg-3">
            <label class="form-label" style="font-weight: 500;">Check-in</label>
            <input type="date" class="form-control shadow-none">
          </div>
          <div class="col-lg-3">
            <label class="form-label" style="font-weight: 500;">Check-out</label>
            <input type="date" class="form-control shadow-none">
          </div>
          <div class="col-lg-3">
          <label class="form-label" style="font-weight: 500;">Adult</label>
          <select class="form-select  shadow-none" >
           <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
             <option value="3">Three</option>
             
</select>
          </div>
          <div class="col-lg-2">
          <label class="form-label" style="font-weight: 500;">Children</label>
          <select class="form-select  shadow-none" >
           
            <option value="1">One</option>
            <option value="2">Two</option>
             <option value="3">Three</option>
             </select>
          </div>
          <div class="col-lg-1">
            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
-->
<!----ROOMS-->
<h2 class="mt-5 pt-4 text-center fw-bold h-font">OUR ROOMS</h2>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 my-3">
    <div class="card border-0 shadow" style="max-width: 350px;margin:auto;">
  <img src="images/rooms/55.png" class="card-img-top" >
  <div class="card-body">
    <h5 >Simple Room </h5>
    <h6 class="mb-4">$200 per night</h6>
    <div class="features mb-4">
      <h6 class="mb-1">Features </h6>
      <span class="badge bg-light text-dark  text-wrap lh-base">
         1 Bedroom
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         1 Bathroom
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         1 Sofa
        </span>
    </div>
    <div class="facilities mb-4"></div>
    <h6 class="mb-1">Facilities </h6>
    <span class="badge bg-light text-dark  text-wrap lh-base">
         WiFi
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         AC
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         Television
        </span>

        <div class="guests mb-4"></div>
    <h6 class="mb-1">Guests </h6>
    <span class="badge bg-light text-dark  text-wrap lh-base">
        5 Adults
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         4 Children
        </span>
       


        <div class="rating mb-4">
        <h6 class="mb-1">Rating </h6>
        <span class="badge rounded-pill by light">
        <i class="bi bi-star-fill text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        </span>
        
        </div>

        <d class="d-flex justify-content-evenly mb-2">
          <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
          <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none ">More Details</a>
        </d>
    
  </div>
</div>
    </div>

    <!--ROOM 2-->

    <div class="col-lg-4 col-md-6 my-3">
    <div class="card border-0 shadow" style="max-width: 350px;margin:auto;">
  <img src="images/rooms/2.png" class="card-img-top" >
  <div class="card-body">
    <h5 >Single Room </h5>
    <h6 class="mb-4">$300 per night</h6>
    <div class="features mb-4">
      <h6 class="mb-1">Features </h6>
      <span class="badge bg-light text-dark  text-wrap lh-base">
         1 Bedroom
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         1 Bathroom
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         1 Chair
        </span>
    </div>
    <div class="facilities mb-4"></div>
    <h6 class="mb-1">Facilities </h6>
    <span class="badge bg-light text-dark  text-wrap lh-base">
         WiFi
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         AC
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         Television
        </span>
        <div class="guests mb-4"></div>
    <h6 class="mb-1">Guests </h6>
    <span class="badge bg-light text-dark  text-wrap lh-base">
        1 Adult
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         0 Children
</span>

        <div class="rating mb-4">
        <h6 class="mb-1">Rating </h6>
        <span class="badge rounded-pill by light">
        <i class="bi bi-star-fill text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        </span>
        
        </div>

        <d class="d-flex justify-content-evenly mb-2">
          <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
          <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none ">More Details</a>
        </d>
    
  </div>
</div>
    </div>


    <!--ROOM 3-->
    <div class="col-lg-4 col-md-6 my-3">
    <div class="card border-0 shadow" style="max-width: 350px;margin:auto;">
  <img src="images/rooms/6.png" class="card-img-top" >
  <div class="card-body">
    <h5 >Double Room</h5>
    <h6 class="mb-4">$450 per night</h6>
    <div class="features mb-4">
      <h6 class="mb-1">Features </h6>
      <span class="badge bg-light text-dark  text-wrap lh-base">
         2 Bedroom
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         1 Bathroom
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         2 Sofa
        </span>
    </div>
    <div class="facilities mb-4"></div>
    <h6 class="mb-1">Facilities </h6>
    <span class="badge bg-light text-dark  text-wrap lh-base">
         WiFi
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         AC
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         Television
        </span>

        <div class="guests mb-4"></div>
    <h6 class="mb-1">Guests </h6>
    <span class="badge bg-light text-dark  text-wrap lh-base">
        4 Adults
        </span>
        <span class="badge bg-light text-dark  text-wrap lh-base">
         4 Children
        </span>
        
        <div class="rating mb-4">
        <h6 class="mb-1">Rating </h6>
        <span class="badge rounded-pill by light">
        <i class="bi bi-star-fill text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        <i class="bi bi-star-fill  text-warning"></i>
        </span>
        
        </div>

        <d class="d-flex justify-content-evenly mb-2">
          <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
          <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none ">More Details</a>
        </d>
    
  </div>
</div>
    </div>

    <div class="col-lg-12 text-center mt-5">
          <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms>>></a>
    </div>
  </div>
</div>

<!----FACILITIES--->
<h2 class="mt-5 pt-4 text-center fw-bold h-font">OUR FACILITIES</h2>

<div class="container">
  <div class="row justify-content-evenly px-lg-0 px-md-0 px-5 ">
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/facilities/wifi.svg" width="80px">
      <h5 class ="mt-3">Wifi</h5>

    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/facilities/laundry.png" width="80px">
      <h5 class ="mt-3">Laundry</h5>

    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/facilities/Tennis.png" width="80px">
      <h5 class ="mt-3">Tennis</h5>

    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/facilities/parking.png" width="80px">
      <h5 class ="mt-3">Parking</h5>

    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images/facilities/Terrace.png" width="80px">
      <h5 class ="mt-3">Terrace</h5>

    </div>
      <div class="col-lg-12 text-center mt-5">
        <a  href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">MORE FACILITIES<<<</a>
      </div>
  </div>
</div>

<!--- COMMENTS-->
<div class="comments-container">
        <div class="comment">
            <div class="user-info">
            <h3 class="h-font fw-bold fs-3 mb-2">COMMENTS</h3>
            <span class="username fw-bold">John Doe</span>

            </div>
            <p class="comment-text">Loved Your Services</p>
        </div>
        <div class="comment">
            <div class="user-info">
                
                <span class="username fw-bold">Jane Smith</span>
            </div>
            <p class="comment-text">Nice Interiors</p>
        </div>
        <div class="comment">
            <div class="user-info">
                
                <span class="username fw-bold">Sammy Treay</span>
            </div>
            <p class="comment-text">Fast Booking Confirmation</p>
        </div>
        <div class="comment">
            <div class="user-info">
                
                <span class="username fw-bold">Annie Watson</span>
            </div>
            <p class="comment-text">Great Facilities</p>
        </div>
        <div class="comment">
            <div class="user-info">
                
                <span class="username fw-bold">Clive Hatheway</span>
            </div>
            <p class="comment-text">Alreay planning my next booking here</p>
        </div>
        
    </div>
 

    
<?php require('inc/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

 <!-- Initialize Swiper -->
 <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
    });
 </script>

  </script>
  </body>
</html>