<?php 
error_reporting(0);
include 'assets/php/db.php';
require 'assets/php/function.php';
require_once "assets/vendor/mobile-detect/Mobile_Detect.php";
$detect = new Mobile_Detect;
$page = $_GET['page'];
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Desa Mekarsari</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Font awesome Start -->
    <link href="assets/vendor/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.css" rel="stylesheet">
    <!-- Sweetalert start -->
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/vendor/carousel/">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

  <script src="assets/vendor/chartjs/chart.js"></script>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
      
      window.addEventListener('scroll', function() {
        if (!x.matches) {
        if (window.scrollY > 50) {
          document.getElementById('navbar_top').classList.add('fixed-top');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.navbar').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
           document.getElementById('navbar_top').classList.remove('fixed-top');
           // remove padding top from body
          document.body.style.paddingTop = '0';
        } 
    }});
    }); 
    // DOMContentLoaded  end

    var x = window.matchMedia("(max-width: 1279px)")
  </script>


<body>

  <?php 
    include "page/header.php";
   ?>

  <!-- ======= Header ======= -->
  <!-- End Header -->

  <main id="main">
    <?php
    if ($page =="") {
      include 'page/main.php';
    }elseif ($page == "view-post") {
      include "page/view-post.php";
    }elseif ($page == "product") {
      include 'page/product/list-product.php';
    }elseif ($page == "chart") {
      include 'page/chart/chart.php';
    }elseif ($page == "agenda") {
      include 'page/agenda.php';
    }
    ?>
  </main><!-- End #main -->

  
  <?php 
  include "page/footer.php";
   ?>  
   <script> // detect mobile
    function myFunction(x) {
      if (x.matches) { // If media query matches
        document.getElementById("sosmed").style.display = "none";
        document.getElementById("header").style.display = "none";
        document.getElementById('navbar_top').classList.add('fixed-top');
        document.getElementById('logo').style.display = "block";
      }
    }
    
        var x = window.matchMedia("(max-width: 1279px)")
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes
      </script>

      <script> // scroll function
      if(!x.matches) {
        window.onscroll = function() {scrollFunction()};
      }
    function scrollFunction() {
      // if (!x.matches) {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
          // document.getElementById("logo").style.display = "none";
          document.getElementById("logo").style.display = "block";
        } else {
          document.getElementById("logo").style.display = "none";
          // document.getElementById("logo").style.display = "none";
        }
      

      var x = window.matchMedia("(max-width: 1279px)")
    }
    </script>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  
</body>
</html>