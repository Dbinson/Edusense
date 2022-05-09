<html lang="en">

<head>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo TITLE; ?> 
    </title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->

    <!--Custom CSS-->
    <!-- <link rel="stylesheet" href="../../public/css/sidebar.css"> -->

    <script src="../../js/jquery.js"></script>

  <!--Custom CSS-->
  <!-- <link rel="stylesheet" href="../../public/css/sidebar.css"> -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../../public/css/admin.css">
  <link rel="stylesheet" href="../../public/css/global.css">
  <link rel="stylesheet" href="../css/archive.css">
  <link rel="stylesheet" href="../css/book.css">
  <link rel="stylesheet" href="../css/home.css">



    <!--BootStrap Javascript-->
    <!-- <script src="../../js/bootstrap.js"></script> -->

    <!--Ajax Requests-->
    <script src="../../public/js/ajaxrequest.js"></script>

    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


    <!----===== Boxicons CSS ===== -->
    <!-- <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> -->

    <!-- <script src="https://kit.fontawesome.com/08917cd252.js" crossorigin="anonymous"></script> -->

</head>

<body>

<div id="mySidebar" class="sidebar">

      <div class="sidebar-header text-center">
        <img class="" src="../../public/assets/logo3.png" alt="logo">
      </div>
      <!-- <a href="javascript:void(0)" class=" closebtn">x</a> -->
      <ul class="text-center s">
        <!-- <li class="slidebar-Item <?php //if(PAGE == 'dashboard'){echo 'active';} ?>">
          <i class="material-icons ic">home</i>
          <a href="#" >Dashboard</a>
        </li> -->

        <!-- For Subject -->
        <li class="slidebar-Item <?php if(PAGE == 'courses'){echo 'active';} ?>">
          <i class="material-icons ic">local_library</i>
          <a href="../subjects">Subjects</a>
          <!-- <a href="#courseSubmenu" data-bs-toggle="collapse" aria-expanded="false">Subjects</a> -->
        </li>
        <!-- sublist COURSES-->
        <!-- <ul class="collapse list-unstyled list-group sublist" id="courseSubmenu">
          <li>
              <a href="../courses/Course.php">View Courses</a>
          </li>
          <li>
              <a href="../courses/Subject.php">View Subjects</a>
          </li>
        </ul> -->



        <!-- <li class="slidebar-Item <?php if(PAGE == 'demo'){echo 'active';} ?>">
          <i class="material-icons ic">airplay</i>
          <a href="#demoSubmenu" data-bs-toggle="collapse" aria-expanded="false">Demo</a>
        </li> -->
        <!-- sublist Demo-->
        <!-- <ul class="collapse list-unstyled list-group sublist" id="demoSubmenu">
          <li>
              <a href="../courses/Course.php">Demo Requests</a>
          </li>
          <li>
              <a href="../demo/demo.php">Assigned Demo</a>
          </li>
        </ul> -->

        <li class="slidebar-Item <?php if(PAGE == 'mcq'){echo 'active';} ?>">
          <i class="material-icons ic">contacts</i>
          <a href="../mcqs">MCQs</a>
        </li>

        <li class="slidebar-Item <?php if(PAGE == 'assignment'){echo 'active';} ?>">
          <i class="material-icons ic">assignment_ind</i>
          <a href="../assignment">Assignment</a>
        </li>

        <li class="slidebar-Item <?php if(PAGE == 'notes'){echo 'active';} ?>">
          <i class="material-icons ic">import_contacts</i>
          <a href="#notesubmenu" data-bs-toggle="collapse" aria-expanded="true">Notes</a>
        </li>
        <!-- sublist notes-->
        <ul class="collapse list-unstyled list-group sublist" id="notesubmenu">
          <li>
              <a href="../notes/index.php">Institute Notes</a>
          </li>
          <li>
              <a href="../notes/facultyNotes.php">Faculty Notes</a>
          </li>
        </ul>

        <li class="slidebar-Item pt-5">
          <i class="material-icons ic">exit_to_app</i>
          <a href="../../logout.php">LogOut</a>
        </li>

      </ul>
    </div>
    
    
    <div id="main">
      <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
        <nav class="navbar nav sticky-top">
            <button class="openbtn">☰</button>
            <div class=" nav justify-content-end pe-4">
              <!-- notification bell -->
              <!-- <button type="button" class="btn position-relative pe-5" data-bs-toggle="popover-notify">
                <i class="material-icons">notifications</i>
                <span class="position-absolute top-1 start-90 translate-middle p-2 bg-danger border border-light rounded-circle">
                  <span class="visually-hidden">New alerts</span>
                </span>
              </button> -->
              <!-- Popover for Notification -->
              <ul id="popover-content-notify" class="list-group text-center" style="display: none">
                <li class="list-group-item">This is notification1</li>
                <a href="#" class="list-group-item">View</a>
              </ul>

              <!-- for Account -->
              <a href="">
                <img src="../../public/assets/defaultpic.png" class="profile-pic">
              </a>
              
            </div>
          </nav>