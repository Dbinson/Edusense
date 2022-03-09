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
  <link rel="stylesheet" href="../css/bootstrap.css">
  <!-- <link rel="stylesheet" href="css/all.min.css"> -->

  <!--Custom CSS-->
  <link rel="stylesheet" href="../public/css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--BootStrap Javascript-->
  <script src="../js/bootstrap.js"></script>

<!--Ajax Requests-->
<script src="../public/js/ajaxrequest.js"></script>


  <!--Modals import-->
  <?php
    include("../modals/loginUserModal.php");
    include("../modals/userRegModal.php");
  ?>

  <!--FontAwesome icom kit link-->
  <script src="https://kit.fontawesome.com/08917cd252.js" crossorigin="anonymous"></script>


</head>
<body>

 <!-- Start Nagigation -->
 <nav class="navbar navbar-expand-sm navbar-dark pl-5 static-top nav-background">
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
                 
              if (isset($_SESSION['is_login'])){

                echo '<div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                  <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                  <li><a class="dropdown-item" href="#">Dashboard</a></li>
                  <li><a class="dropdown-item" href="#">My Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
              </div>';

                // echo '<li class="nav-item custom-nav-item">
                //         <a href="student/studentProfile.php" class="nav-link">My Profile</a>
                //       </li> 
                //       <li class="nav-item custom-nav-item">
                //         <a href="logout.php" class="nav-link">Logout</a>
                //       </li>';
              } else {
                echo '<li class="nav-item custom-nav-item">
                        <a href="#login" class="nav-link" data-bs-toggle="modal" data-bs-target="#userLoginModalCenter">Login</a>
                      </li>
                      <li class="nav-item custom-nav-item">
                        <a href="#signup" class="nav-link" data-bs-toggle="modal" data-bs-target="#userRegModalCenter">Signup</a>
                        </li>';
              }
          ?> 
          
        </ul>
        
      </div>
    </div>
  </nav> <!-- End Navigation -->
