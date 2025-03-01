<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sapphire Hotel-ABOUT</title>
   

  <?php require('inc/links.php');?>
  <style>
        .image-container {
            display: flex;
            justify-content: space-between;
            align-items: center; 
        }
        .image-container img {
            width: auto; 
            height: auto;
            margin-bottom: 10px;
        }
        .image-title {
            text-align: center; 
        }
    </style>
  <style>
    .box{
      border-top-color:var(--teal)!important;
    }
  </style>
    <link
     rel="stylesheet" 
     href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
  

</head>
<body class="bg-light">

<?php require('inc/header.php');?>
  
<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">ABOUT US</h2>
  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">
  "Welcome to our hotel, where luxury meets comfort and every detail is crafted to perfection.
   Immerse yourself in a world of elegance and impeccable service, where your satisfaction is our top priority.
    Experience the epitome of hospitality and create unforgettable memories with us."


  </p>


</div>



<div class="container">
  <div class="row ">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
      <h3 class="mb-3">Inception Chronicles: Tracing the Beginnings of Hotelier Extraordinaire,Sophia Carter</h3>
      <p>
      In 2005, amidst the bustling cityscape, Sofia Carter envisioned a sanctuary of refined luxury, thus birthing the Sapphire Hotel. 
      Her tireless pursuit of perfection and commitment to unparalleled hospitality defined every aspect of its creation. With an eye for elegance and a heart for hospitality,
       Sofia curated an environment where guests are greeted with warmth and sophistication. From the grandeur of the lobby to the intimacy of the suites, Sofia's vision resonates, creating an atmosphere of unparalleled indulgence.
        With a keen attention to detail and an unwavering commitment to guest satisfaction, she has set a new standard in luxury hospitality, inviting travelers to immerse themselves in an experience that transcends the ordinary.
        Today, the Sapphire Hotel stands as a testament to her vision, offering a haven where every stay is an unforgettable journey into opulence and comfort.
      </p>
    </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
      <img src="images\about\founder.png" class="img-fluid" style="max-width:100%">;

    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/hotel.svg" width="70px">
        <h4 class="mt-3">100+ ROOMS</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/customers.svg" width="70px">
        <h4 class="mt-3">200+ CUSTOMERS</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/rating.svg" width="70px">
        <h4 class="mt-3">150+ REVIEWS</h4>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-4 px-4">
      <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
        <img src="images/about/staff.svg" width="70px">
        <h4 class="mt-3">200+ STAFFS</h4>
      </div>
    </div>
  </div>
</div>

<h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>
    <div class="image-container">
        <div>
            <img src="images/about/president.png" alt="President">
            <div class="image-title fw-bold">President</div>
        </div>
        <div>
            <img src="images/about/chef.png" alt="Chef">
            <div class="image-title fw-bold">Chefs</div>
        </div>
        <div>
            <img src="images/about/managementoffice.png" alt="Management Office">
            <div class="image-title fw-bold">Management Office</div>
        </div>
    </div>
<?php require('inc/footer.php');?>

  </body>
</html>