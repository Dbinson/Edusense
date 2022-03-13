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
  <title>Profile</title>

  <!--BOOTSTRAP CSS-->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <!-- <link rel="stylesheet" href="css/all.min.css"> -->

  <!--Custom CSS-->
  <link rel="stylesheet" href="../public/css/sidebar.css">

  <script src="../js/jquery.js"></script>

  

  <!--BootStrap Javascript-->
  <script src="../js/bootstrap.js"></script>

<!--Ajax Requests-->
<script src="../public/js/ajaxrequest.js"></script>

 <!----===== Boxicons CSS ===== -->
 <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

 <script src="https://kit.fontawesome.com/08917cd252.js" crossorigin="anonymous"></script>

</head>
<body>

<!-- Top bar -->
<nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-dark">
      <div class="container-fluid">
        <div class="nav-right navbar-collapse " id="navbarCenteredExample" >
          <!-- Left links -->
          <ul class="navbar-nav ms-auto mb-lg-0">
            <li class="nav-item px-2">
              <button type="button" class="btn btn-primary">
              <i class="fa-solid fa-bell"></i>
              <span class="badge bg-secondary">4</span>
              </button>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
  <!-- SideBar -->
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

                <div class="text logo-text">
                    <span class="name">Codinglab</span>
                    <span class="profession">Web developer</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links list-unstyled">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>



