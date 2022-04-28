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
  <!-- <script src="./public/js/index.js"></script> -->
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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="./public/assets/MainLogo.png" alt="logo" height="60">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-lg-0">
                <li class="nav-item px-2">
                  <a class="nav-link active" aria-current="page" href="#section-1">Home</a>
                </li>
                <li class="nav-item px-2">
                  <a class="nav-link" href="#section-5">Courses</a>
                </li>
                <li class="nav-item px-2">
                  <a class="nav-link" href="#section-4">Feedback</a>
                </li>
                <li class="nav-item px-2">
                  <a class="nav-link" href="#footer">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['is_login'])){
                  echo '<li class="nav-item px-2">';
                  if($_SESSION['logRole'] == 102){
                    echo '<a href="./faculty/subject" class="btn btn-outline-warning ">My Profile</a>';
                  }else if($_SESSION['logRole'] == 103){
                    echo '<a href="./student/subject" class="btn btn-outline-warning ">My Profile</a>';
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
  </div>
</nav>