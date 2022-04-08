<!DOCTYPE html>
<html lang="en">
<head>

  <?php
    if(!isset($_SESSION)){ 
      session_start(); 
    }
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edusense|Home</title>

  <!--BOOTSTRAP CSS-->
  <link rel="stylesheet" href="./css/bootstrap.css">
  <!-- <link rel="stylesheet" href="css/all.min.css"> -->

  <!--Custom CSS-->
  <link rel="stylesheet" href="./public/css/style.css">
  <link rel="stylesheet" href="./public/css/mainStyle.css">
  <!-- <link rel="stylesheet" href="./public/css/testimonial.css"> -->

  <script src="js/jquery.js"></script>
  <script src="./public/js/index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

  <!--BootStrap Javascript-->
  <script src="./js/bootstrap.bundle.min.js"></script>


<!--Ajax Requests-->
<script src="./public/js/ajaxrequest.js"></script>


  <!--Modals import-->
  <?php
    include("./modals/loginUserModal.php");
    include("./modals/userRegModal.php");
  ?>

  <!-- swiper.js css imports -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css"/>
<!-- Swiper JS -->
<script src="js/swiper-bundle.min.js" ></script>

  <!--FontAwesome icom kit link-->
  <script src="https://kit.fontawesome.com/08917cd252.js" crossorigin="anonymous"></script>


</head>
<body>

<?php
  if(!isset($_SESSION)){
    session_start();
  }
  include_once('./dbConnection.php');
?>


    <!-- Navbar -->
    <nav class="navbar m-0 navbar-expand-sm navbar-light sticky-top" id="main_nav">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <div class="row pb-2">
          <div class="col-lg-6 nav-left ">
            <a class="navbar-brand" href="#">
              <img src="./public/assets/MainLogo.png" height="90" alt="logo" />
            </a>
              <!-- Toggle button -->
            <button
              class="navbar-toggler"  type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation" >
              <i class="fas fa-bars"></i>
            </button>
          </div>
          <!-- <div class="col-6 nav-right"> -->
            <!-- Collapsible wrapper -->
            <div class="col-6 nav-right collapse navbar-collapse " id="navbarCenteredExample" >
              <!-- Left links -->
              <ul class="navbar-nav ms-auto mb-lg-0">
                <li class="nav-item px-2">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item px-2">
                  <a class="nav-link" href="#">Courses</a>
                </li>
                <li class="nav-item px-2">
                  <a class="nav-link" href="#">Feedback</a>
                </li>
                <li class="nav-item px-2">
                  <a class="nav-link" href="#">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['is_stud_login']) || isset($_SESSION['is_fac_login'])){
                  echo '<li class="nav-item px-2">';
                  if($_SESSION['logRole'] == 102){
                    echo '<a href="./faculty/dashboard" class="btn btn-outline-warning ">My Profile</a>';
                  }else if($_SESSION['logRole'] == 103){
                    echo '<a href="./student/dashboard" class="btn btn-outline-warning ">My Profile</a>';
                  }
                  
                  echo '
                </li>
                <li class="nav-item px-2">
                  <a href="./logout.php" class="btn btn-outline-info ">Log Out</a>
                </li>
                ';
                }else{
                echo '<li class="nav-item px-2">
                  <a href="./login.php" class="btn btn-outline-info ">Login</a>
                </li>
                <li class="nav-item px-2">
                  <a href="./signup.php" class="btn btn-outline-warning ">SignUp</a>
                </li>';
                }
                ?>
              </ul>
            </div>
          <!-- </div>end col -->
        </div>
        <!-- Collapsible wrapper -->
      </div><!-- Container wrapper -->
    </nav>
    <!-- <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
          <a class="navbar-brand" href="../index.html">
            <img src="./public/assets/MainLogo.png" height="85" alt="logo" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> </span>
          </button>
          <div class="collapse navbar-collapse mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="#">Courses</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="#">Feedback</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="#">Contact</a></li>
            </ul><a class="btn btn-primary order-1 order-lg-0" href="#!">Sign Up</a>

            <form class="d-flex my-3 d-block d-lg-none"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" /><button class="btn btn-outline-primary" type="submit">Search</button></form>
            <div class="dropdown d-none d-lg-block"><button class="btn btn-outline-light ms-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-800"></i></button>
              <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton1" style="top:55px">
                <form><input class="form-control" type="search" placeholder="Search" aria-label="Search" /></form>
              </ul>
            </div>
          </div>
        </div>
      </nav> -->
<!-- Navbar -->






 <!-- Start Nagigation -->
 <!-- <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top nav-background">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand">Edusense</a>
      <span class="navbar-text">Learning Academic</span>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myMenu">
        <ul class="navbar-nav pl-5 custom-nav">
          <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
          <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
          <li class="nav-item custom-nav-item"><a href="#Feedback" class="nav-link">Feedback</a></li>
          <li class="nav-item custom-nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
          <?php 
                 
              // if (isset($_SESSION['is_login'])){

              //   echo '
              //   <div class="navbar-nav ms-auto">
              //     <div class="dropdown">
              //     <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              //       <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              //       <strong>mdo</strong>
              //     </a>
              //     <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              //       <li><a class="dropdown-item" href="#">Dashboard</a></li>
              //       <li><a class="dropdown-item" href="#">My Profile</a></li>
              //       <li><hr class="dropdown-divider"></li>
              //       <li><a class="dropdown-item" href="#">Sign out</a></li>
              //     </ul>
              //     </div>
              // </div>';
              //   // echo '<li class="nav-item custom-nav-item">
              //   //         <a href="student/studentProfile.php" class="nav-link">My Profile</a>
              //   //       </li> 
              //   //       <li class="nav-item custom-nav-item">
              //   //         <a href="logout.php" class="nav-link">Logout</a>
              //   //       </li>';
              // } else {
              //   echo '<li class="nav-item custom-nav-item">
              //           <a href="#login" class="nav-link" data-bs-toggle="modal" data-bs-target="#userLoginModalCenter">Login</a>
              //         </li>
              //         <li class="nav-item custom-nav-item">
              //           <a href="#signup" class="nav-link" data-bs-toggle="modal" data-bs-target="#userRegModalCenter">Signup</a>
              //           </li>';
              // }
          ?> 
        </ul>
      </div>
    </div>
  </nav> End Navigation -->
