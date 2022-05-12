<?php
include('./mainInclude/header.php');
include_once('./dbConnection.php');

?>

<main class="" id="">
  <section class=" mb-6" id="section-1">

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <div class="container-fluid carousel-item active py-5 home1" data-bs-interval="3000">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end">
              <img class="w-100" src="public/assets/aa.png" alt="hero-header" />
            </div>
            <div class="col-md-7 col-lg-6 text-md-start text-center cc py-6">
              <h1 class="fs-6 fs-xl-7 mb-5 ml3">Broaden your knowledge with Edusession</h1>
              <a class="btn btn-c" href="#!" role="button"> Get Started</a>
            </div>
          </div>
        </div>
        <div class="carousel-item " data-bs-interval="5000">
          <img src="./public/assets/top-slider/1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="./public/assets/top-slider/3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <section class="container-fluid text-center py-4" id="section-2">
    <div class="container">
      <div class="row ">
        <div class="col fadein">
          <h2 class="fs-1 pt-5 h-auto">Why you should choose us?</h2>
        </div>
      </div>
      <div class="row pt-5">
        <div class="col-4 fadein">
          <img src="./public/assets/goal.svg" alt="goal image" class="img">
          <h5 class="my-3">Our mission</h5>
          <p>our mission is to encourage our students towards knowledge and to give them a solid foundation to build on. our learning platform aims to bring out the best in every student.</p>
        </div>
        <div class="col-4"></div>
        <div class="col-4 fadein">
          <img src="./public/assets/value.svg" alt="goal image" class="img">
          <h5 class="my-3">Values</h5>
          <p>we are committed to providing a positive, stimulating and interactive environment for the students where all are valued .</p>
        </div>
      </div>
      <div class="row ">
        <div class="col">
          <img src="./public/assets/a-illustration/ai-1.gif" alt="a-illustration" style="width: 25em;">
        </div>
      </div>
      <div class="row pt-5">
        <div class="col-4 fadein">
          <img src="./public/assets/target.svg" alt="goal image" class="img">
          <h5 class="my-3">Aim</h5>
          <p>our learning center exists to provide developmental, safe and valued education environment for preschool, primary, secondary, higher secondary students as well as special training courses for competitive examinations including NEET, IIT-JEE, GATE, CAT and MHCET.</p>
        </div>
        <div class="col-4"></div>
        <div class="col-4 fadein">
          <img src="./public/assets/value.svg" alt="goal image" class="img">
          <h5 class="my-3">Values</h5>
          <p>we are committed to providing a positive, stimulating and interactive environment for the students where all are valued .</p>
        </div>
      </div>
    </div>
  </section>

  <section class="container-fluid " id="section-3">
    <div class="container ">
      <div class="row">
        <div class="col">
          <h2 class="text-center fs-1">How it works?</h2>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-4 text-center">
          <img src="./public/assets/tutor-how-icon4.png" alt="tutorial icon">
          <div class="row mt-5">
            <div class="col-5 text-end">
              <span class="pe-4 fs-1">1</span>
            </div>
            <div class="col-7">
              <p class="text-start fs-5 text-wrap">Select your course from various courses.</p>
            </div>
          </div>
        </div>
        <div class="col-4  text-center">
          <img src="./public/assets/tutor-how-icon5.png" alt="tutorial icon">
          <div class="row mt-5">
            <div class="col-5 text-end">
              <span class="pe-4 fs-1">2</span>
            </div>
            <div class="col-7">
              <p class="text-start fs-5 text-wrap">Our team will get in touch with you.</p>
            </div>
          </div>
        </div>
        <div class="col-4  text-center">
          <img src="./public/assets/tutor-how-icon6.png" alt="tutorial icon">
          <div class="row mt-5
        ">
            <div class="col-5 text-end">
              <span class="pe-4 fs-1">3</span>
            </div>
            <div class="col-7">
              <p class="text-start fs-5 text-wrap">Start learning with Edusession.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="section-5">
    <div class="container-fluid" id="myGroup" justify-content="center">
      <div class="row text-center ">
        <h1 class="display-1 mb-5">Courses</h1>
      </div>
      <div class="row pb-5 text-center justify-content-center ">
        <div class="col-4 course-img  ">
          <a href="./subject.php?s=1">
            <div class="img-back">
              <img src="public/assets/c1.png" alt="course-1 image" width="100%" height="100%">
            </div>
            <h2 class="py-4">Primary School</h2>
          </a>
        </div>
        <div class="col-4  course-img">
          <a href="./subject.php?s=2">
            <div class="img-back">
              <img src="public/assets/c2.png" alt="course-2 image" width="100%" height="100%">
            </div>
            <h2 class="py-4">High School School</h2>
          </a>
        </div>
        <div class="col-4 course-img">
          <a href="./subject.php?s=3">
            <div class="img-back">
              <img src="public/assets/c3.png" alt="course-3 image" width="100%" height="100%">
            </div>
            <h2 class="py-4">Higher Secondary School</h2>
          </a>
        </div>
      </div>
    </div>
  </section>

 

    <?php
    $sql = "SELECT feedback.student_id,feedback.ratings,feedback.feedback_desc,student.stud_name,student.profile_pic from feedback
            LEFT JOIN student ON feedback.student_id = student.student_id
            WHERE feedback.ratings >= 3";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      if (mysqli_num_rows($query) >= 1) {
        echo '
        <section id="section-4">
        <div class="container text-center">
          <div class="section-title">
            <h2>Testimonials</h2>
            <span class="section-separator"></span>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>
        <div class="testimonials-carousel-wrap text-center">
                <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right" style="color: #fff"></i></div>
                <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left" style="color: #fff"></i></div>
                <div class="testimonials-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper"> ';
        while ($r = mysqli_fetch_assoc($query)) {
          echo '
              <!-- start -->
              <div class="swiper-slide">
                  <div class="testi-item">
                      <div class="testi-avatar">';
          if ($r['profile_pic'] == null) {
            echo '<img src="./public/assets/defaultpic.png">';
          } else {
            echo '<img src="' . $r['profile_pic'] . '">';
          }
          echo '
            </div>
            <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
            <div class="testimonials-text">
                <div class="listing-rating">';
          for ($i = 1; $i <= $r['ratings']; $i++) {
            echo '<i class="fa fa-star"></i>';
          }
          echo '
                      </div>
                      <p>' . $r['feedback_desc'] . '</p>
                      <a href="#" class="text-link"></a>
                      <div class="testimonials-avatar">
                          <h3>' . $r['stud_name'] . '</h3>
                          <h4>Student</h4>
                      </div>
                  </div>
                  <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div> 
              </div>
          </div>
          <!--testi end-->


                          ';
        }
        echo '
        </div>
        </div>
        </div>
    
        <!-- <div class="tc-pagination text-right"></div> -->
        </div>
      </section>
        ';
      }
    }
    ?>


    </div>
    </div>
    </div>

    <!-- <div class="tc-pagination text-right"></div> -->
    </div>
  </section>

  <?php
  // if(!isset($_SESSION['is_login'])){
  //   echo '<a class="btn btn-danger mt-3" href="#" data-bs-toggle="modal" data-bs-target="#userRegModalCenter">Get Started</a>';
  // } else {
  //   switch ($_SESSION['logRole']){
  //     case 103:
  //       echo '<a class="btn btn-primary mt-3" href="student/studentProfile.php">My Profile</a>';
  //       break;
  //     case 102:
  //       echo '<a class="btn btn-primary mt-3" href="faculty/facultyProfile.php">My Profile</a>';
  //       break;
  //     default:
  //       echo '<a class="btn btn-primary mt-3" href="student/studentProfile.php">My Profile</a>';

  //   }

  // }
  ?>
</main>



<script src="./public/js/index.js"></script>
<?php include('./mainInclude/footer.php'); ?>