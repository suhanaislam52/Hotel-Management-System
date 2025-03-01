<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sapphire Hotel-ROOMS</title>
   

  <?php require('inc/links.php');?>
  
    
  

</head>
<body class="bg-light">

<?php require('inc/header.php');?>
  
<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
  <div class="h-line bg-dark"></div>
  
  <div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-shadow">
        <div class="container-fluid flex-lg-column align-items-stretch">
          <h4 class="mt-2">FILTERS</h4>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
            <div class="border bg-light p-3 rounded mb-3">
              <h5 class="mb-3" style="font-size:18px;">CHECK AVAILABILITY</h5>
              <label class="form-label">Check-in</label>
              <input type="date" class="form-control shadow-none mb-3">
              <label class="form-label">Check-out</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <!--
            <div class="border bg-light p-3 rounded mb-3">
              <h5 class="mb-3" style="font-size:18px;">FACILITIES</h5>
              <div class="mb-2">
                <input type="checkbox"  id="f1" class="form-check-input shadow-none me-1">
                <label class="form-check-label">Facility one</label>
              </div>
              <div class="mb-2">
                <input type="checkbox"  id="f2" class="form-check-input shadow-none me-1">
                <label class="form-check-label">Facility two</label>
              </div>
              <div class="mb-2">
                <input type="checkbox"  id="f3" class="form-check-input shadow-none me-1">
                <label class="form-check-label">Facility three</label>
              </div>
            </div>
            <div class="border bg-light p-3 rounded mb-3">
              <h5 class="mb-3" style="font-size:18px;">GUESTS</h5>
              <div class="d-flex">
                <div class="me-3">
                  <label class="form-label">Adults</label>
                  <input type="number" class="form-control shadow-none">
                </div>
                <div>
                  <label class="form-label">Children</label>
                  <input type="number" class="form-control shadow-none">
                </div>
              </div>
            </div>
          </div>
        </div>
-->
      </nav>
    </div>


    <!--room1-->
    <div class="col-lg-9 col-md-12 px-4">
  <div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">
      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        <img src="images/rooms/1.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3">Simple Room </h5>
        <div class="features mb-4">
          <h6 class="mb-3">Features</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bedroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bathroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Sofa</span>
        </div>
        <div class="facilities mb-3">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">WiFi</span>
          <span class="badge bg-light text-dark text-wrap lh-base">AC</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Television</span>
        </div>
        <div class="guests">
          <h6 class="mb-1">Guests</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">5 Adults</span>
          <span class="badge bg-light text-dark text-wrap lh-base">4 Children</span>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <h6 class="mb-4">$200 per night</h6>
        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
        
      </div>
    </div>
  </div>


  <!--room2-->
  <div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">
      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        <img src="images/rooms/2.png" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3">Single Room</h5>
        <div class="features mb-4">
          <h6 class="mb-3">Features</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bedroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bathroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Chair</span>
        </div>
        <div class="facilities mb-3">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">WiFi</span>
          <span class="badge bg-light text-dark text-wrap lh-base">AC</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Television</span>
        </div>
        <div class="guests">
          <h6 class="mb-1">Guests</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Adults</span>
          <span class="badge bg-light text-dark text-wrap lh-base">0 Children</span>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <h6 class="mb-4">$300 per night</h6>
        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
        
      </div>
    </div>
  </div>


  <!--room3-->
  <div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">
      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        <img src="images/rooms/6.png" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3">Double Room</h5>
        <div class="features mb-4">
          <h6 class="mb-3">Features</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">2 Bedroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bathroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">2 Sofa</span>
        </div>
        <div class="facilities mb-3">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">WiFi</span>
          <span class="badge bg-light text-dark text-wrap lh-base">AC</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Television</span>
        </div>
        <div class="guests">
          <h6 class="mb-1">Guests</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">4 Adults</span>
          <span class="badge bg-light text-dark text-wrap lh-base">4 Children</span>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <h6 class="mb-4">$450 per night</h6>
        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
       
      </div>
    </div>
  </div>

<!--room4-->
  <div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">
      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        <img src="images/rooms/3.png" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3">Deluxe Room</h5>
        <div class="features mb-4">
          <h6 class="mb-3">Features</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Master Bedroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bathroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Couch</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Dining</span>
        </div>
        <div class="facilities mb-3">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">WiFi</span>
          <span class="badge bg-light text-dark text-wrap lh-base">AC</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Television</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Breakfast in Bed</span>
        </div>
        <div class="guests">
          <h6 class="mb-1">Guests</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">5 Adults</span>
          <span class="badge bg-light text-dark text-wrap lh-base">4 Children</span>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <h6 class="mb-4">$550 per night</h6>
        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
       
      </div>
     </div>
    </div>
  

    <!--room5-->
<div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">
      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        <img src="images/rooms/4.png" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3">Presidential Suite</h5>
        <div class="features mb-4">
          <h6 class="mb-3">Features</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Master Bedroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bathroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">2 Couch</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Dining</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Study</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 lobby</span>
        </div>
        <div class="facilities mb-3">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">WiFi</span>
          <span class="badge bg-light text-dark text-wrap lh-base">AC</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Television</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Breakfast in Bed</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Access to Mini Refrigerator Snacks </span>
        </div>
        <div class="guests">
          <h6 class="mb-1">Guests</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">5 Adults</span>
          <span class="badge bg-light text-dark text-wrap lh-base">4 Children</span>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <h6 class="mb-4">$700 per night</h6>
        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
        
      </div>
    </div>
  </div>


<!--room6-->
<div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">
      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        <img src="images/rooms/5.png" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3">Penthouse Suite</h5>
        <div class="features mb-4">
          <h6 class="mb-3">Features</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Master Bedroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bathroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">2 Couches</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Dining</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Study</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 lobby</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Balcony</span>

        </div>
        <div class="facilities mb-3">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">WiFi</span>
          <span class="badge bg-light text-dark text-wrap lh-base">AC</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Television</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Breakfast in Bed</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Access to Mini Refrigerator Snacks </span>
          <span class="badge bg-light text-dark text-wrap lh-base">Access to Top View </span>

        </div>
        <div class="guests">
          <h6 class="mb-1">Guests</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">5 Adults</span>
          <span class="badge bg-light text-dark text-wrap lh-base">4 Children</span>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <h6 class="mb-4">$950 per night</h6>
        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
       
      </div>
    </div>
  </div>


<!--room7-->
<div class="card mb-4 border-0 shadow">
    <div class="row g-0 p-3 align-items-center">
      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        <img src="images/rooms/7.png" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-5 px-lg-3 px-md-3 px-0">
        <h5 class="mb-3">Pool Villa</h5>
        <div class="features mb-4">
          <h6 class="mb-3">Features</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bedroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Bathroom</span>
          <span class="badge bg-light text-dark text-wrap lh-base">2 Couches</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Dining</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Study</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 lobby</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Balcony</span>
          <span class="badge bg-light text-dark text-wrap lh-base">1 Personal Pool</span>

        </div>
        <div class="facilities mb-3">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">WiFi</span>
          <span class="badge bg-light text-dark text-wrap lh-base">AC</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Television</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Breakfast in Bed</span>
          <span class="badge bg-light text-dark text-wrap lh-base">Access to Mini Refrigerator Snacks </span>
          <span class="badge bg-light text-dark text-wrap lh-base">Access to Top View </span>
          <span class="badge bg-light text-dark text-wrap lh-base">Access to Floating Breakfast in Pool </span>

        </div>
        <div class="guests">
          <h6 class="mb-1">Guests</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">5 Adults</span>
          <span class="badge bg-light text-dark text-wrap lh-base">4 Children</span>
        </div>
      </div>
      <div class="col-md-2 text-center">
        <h6 class="mb-4">$1100 per night</h6>
        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
        
      </div>
    </div>
  </div>
</div>

</div>

</div>
</div>
<?php require('inc/footer.php');?>

  </body>
</html>