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
    <link rel="stylesheet" href="../../public/css/sidebar.css">

    <script src="../../js/jquery.js"></script>

  <!--Custom CSS-->
  <link rel="stylesheet" href="../../public/css/sidebar.css">
  <link rel="stylesheet" href="../css/style.css">



    <!--BootStrap Javascript-->
    <script src="../../js/bootstrap.js"></script>

    <!--Ajax Requests-->
    <script src="../../public/js/ajaxrequest.js"></script>

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://kit.fontawesome.com/08917cd252.js" crossorigin="anonymous"></script>

</head>

<body>


    <nav class="navbar navbar-expand-sm px-4 pt-3 navbar-light sticky-top bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Edusession</a>
            <button class="navbar-toggler" type="button" id="sidebarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="text-right">
                <button type="button" class="btn btn-primary position-relative">
                    Inbox
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
            </div>
        </div>
    </nav>
    <div class="wrapper ">

        <nav id="sidebar" class="bg-primary">

            <ul class="lisst-unstyled components">
                <li class="active">
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#demoSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Demo</a>
                    <ul class="collapse list-unstyled" id="demoSubmenu">
                        <li>
                            <a href="./viewRequest.php">Demo Requests</a>
                        </li>

                        <li>
                            <a href="../demo/demo.php">View Demo</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#studentSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Student</a>
                    <ul class="collapse list-unstyled" id="studentSubmenu">
                        <li>
                            <a href="addStudent.php">Add Student</a>
                        </li>
                        <li>
                            <a href ="student.php">View Students</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#facultySubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Faculty</a>
                    <ul class="collapse list-unstyled" id="facultySubmenu">
                        <li>
                            <a href="addFaculty.php">Add Faculty</a>
                        </li>
                        <li>
                        <a href="faculty.php">View faculties</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#examSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Examination</a>
                    <ul class="collapse list-unstyled" id="examSubmenu">
                        <li>
                            <a href="../examination/exam.php">View Exams</a>
                        </li>
                        <li>
                        <a href="../examination/">View Papers</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="../assignment/viewAssignment.php">Assignments</a>
                </li>

                <li>
                    <a href="#">Notification</a>
                </li>

                <li>
                    <a href="#bookSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Books</a>
                    <ul class="collapse list-unstyled" id="bookSubmenu">
                        <li>
                            <a href="chapter.php">Add Chapter</a>
                        </li>
                        <li>
                            <a href="book.php">Add Book</a>
                        </li>
                        <li>
                            <a href="requestBook.php">Request Book</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#attandanceSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attandance</a>
                    <ul class="collapse list-unstyled" id="attandanceSubmenu">
                        <li>
                            <a href="addAttendance.php">Add attendance</a>
                        </li>
                        <li>
                            <a href="facultyAttendance.php">Faculty attendance</a>
                        </li>
                        <li>
                            <a href="studentAttendance.php">Student attendance</a>
                        </li>


                    </ul>
                </li>

                <li>
                    <a href="feedbackReview.php">Feedback</a>

                </li>


                <li>
                    <a href="#courseSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">course</a>
                    <ul class="collapse list-unstyled" id="courseSubmenu">
                        <li>
                            <a href="Chapter.php">Add Chapter</a>
                        </li>
                        <li>
                            <a href="Course.php">Add Course</a>
                        </li>
                        <li>
                            <a href="Subject.php">Add Subject</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#lectureSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">lecture</a>
                    <ul class="collapse list-unstyled" id="lectureSubmenu">

                        <li>
                            <a href="addlecture.php">Add Lecture</a>
                        </li>
                        <li>
                            <a href="lecturevid.php">Lecture Videos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="schedule.php">Schedule</a>
                </li>

            </ul>
        </nav>