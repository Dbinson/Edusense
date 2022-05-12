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



    <!--BootStrap Javascript-->
    <!-- <script src="../../js/bootstrap.js"></script> -->

    <!--Ajax Requests-->
    <script src="../../public/js/ajaxrequest.js"></script>

    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!----===== Boxicons CSS ===== -->
    <!-- <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> -->

    <!-- <script src="https://kit.fontawesome.com/08917cd252.js" crossorigin="anonymous"></script> -->
    <style>
      .modal-backdrop {
    z-index: 1019 !important;
}
.modal-content {
    margin: 2px auto;
    z-index: 1100 !important;
}
    </style>
</head>

<body>

<div id="mySidebar" class="sidebar">

      <div class="sidebar-header text-center">
        <img class="" src="../../public/assets/logo3.png" alt="logo">
      </div>
      <!-- <a href="javascript:void(0)" class=" closebtn">x</a> -->
      <ul class="text-center s">
        <li class="slidebar-Item <?php if(PAGE == 'enrolledStudent'){echo 'active';} ?>">
          <i class="material-icons ic">home</i>
          <a href="../enrolled-student/" >Enrolled</a>
        </li>

        <li class="slidebar-Item <?php if(PAGE == 'users'){echo 'active';} ?>">
          <i class="material-icons ic">person</i>
          <a href="#userSubmenu" data-bs-toggle="collapse" aria-expanded="false">Users</a>
        </li>
        <!-- sublist USER-->
        <ul class="collapse list-unstyled list-group sublist" id="userSubmenu">
          <li>
              <a href="#" role="button" data-bs-toggle="popoverS">Students</a>
          </li>
          <li>
              <a href="#" role="button" data-bs-toggle="popoverF">Faculty</a>
          </li>
        </ul>


        <!-- Popover for student -->
        <ul id="popover-contentS" class="list-group text-center" style="display: none">
          <a href="../student/addStudent.php" class="list-group-item">Add</a>
          <a href="../student/student.php" class="list-group-item">View</a>
        </ul>

        <!-- Popover for faculty -->
        <ul id="popover-contentF" class="list-group text-center" style="display: none">
          <a href="../faculty/addFaculty.php" class="list-group-item">Add</a>
          <a href="../faculty/faculty.php" class="list-group-item">View</a>
        </ul>



        <li class="slidebar-Item <?php if(PAGE == 'subject'){echo 'active';} ?>">
          <i class="material-icons ic">local_library</i>
          <a href="../subject/Subject.php">Subject</a>
        </li>

        <li class="slidebar-Item <?php if(PAGE == 'demo'){echo 'active';} ?>">
          <i class="material-icons ic">airplay</i>
          <a href="../demo">Demo</a>
        </li>
        <!-- sublist Demo-->
        <!-- <ul class="collapse list-unstyled list-group sublist" id="demoSubmenu">
          <li>
              <a href="../courses/Course.php">Demo Requests</a>
          </li>
          <li>
              <a href="../demo/demo.php">Assigned Demo</a>
          </li>
        </ul> -->

        <!-- <li class="slidebar-Item <?php //if(PAGE == 'lecture'){echo 'active';} ?>">
          <i class="material-icons ic">contacts</i>
          <a href="#lectureSubmenu" data-bs-toggle="collapse" aria-expanded="false">Lecture</a>
        </li>

        <ul class="collapse list-unstyled list-group sublist" id="lectureSubmenu">
          <li>
              <a href="../lecture/addlecture.php">Create Lecture</a>
          </li>
          <li>
              <a href="../lecture/lecturevid.php">Recordings</a>
          </li>
        </ul> -->
<!-- 
        <li class="slidebar-Item <?php if(PAGE == 'attendance'){echo 'active';} ?>">
          <i class="material-icons ic">event</i>
          <a href="#">Attendance</a>
        </li> -->

        <li class="slidebar-Item <?php if(PAGE == 'assignment'){echo 'active';} ?>">
          <i class="material-icons ic">assignment_ind</i>
          <a href="../assignment">Assignment</a>
        </li>

        <!-- <li class="slidebar-Item <?php if(PAGE == 'examination'){echo 'active';} ?>">
          <i class="material-icons ic">assignment</i>
          <a href="#">Examination</a>
        </li> -->

        <li class="slidebar-Item <?php if(PAGE == 'notes'){echo 'active';} ?>">
          <i class="material-icons ic">import_contacts</i>
          <a href="../notes/notes.php">Notes</a>
        </li>

        <li class="slidebar-Item <?php if(PAGE == 'feedback'){echo 'active';} ?>">
          <i class="material-icons ic">important_devices</i>
          <a href="../feedback">feedback</a>
        </li>

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
              <!-- <ul id="popover-content-notify" class="list-group text-center" style="display: none">
                <li class="list-group-item">This is notification1</li>
                <a href="#" class="list-group-item">View</a>
              </ul> -->

              <!-- for Account -->
              <div class="dropdown">
                <!-- <a class="btn p-2 " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../public/assets/t6.jpg" class="profile-pic">
                </a> -->

                
              
              <?php
                include('../../dbConnection.php');
                include('../../modals/changePassModal.php');
                
                // $sql = "SELECT profile_pic FROM faculty WHERE faculty_id='".$_SESSION['faculty_id']."'";
                // $q=mysqli_query($conn,$sql);
                // while($r=mysqli_fetch_assoc($q)){
                //   if($r['profile_pic'] == null){
                //     echo '
                //     <a class="btn p-2 " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                // <img src="../../public/assets/t6.jpg" class="profile-pic">
                // </a>
                //     ';
                //   }else{
                //     echo '
                //     <a href="#">
                //     <img src="'.$r['profile_pic'].'" class="profile-pic">
                //   </a>
                //   ';
                //   }
                // }
                echo '
                     <a class="btn p-2 " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                 <img src="../../public/assets/t6.jpg" class="profile-pic">
                 </a>
                    ';
              ?>
              <ul class="dropdown-menu mr-4" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#changePassModal" type="button"  data-bs-toggle="modal" >Change Password</a></li>
                  <li><a class="dropdown-item" href="./../../logout.php" type="button">Log out</a></li>
                </ul>
              </div>
            </div>
          </nav>