
<?php
  include('./mainInclude/header.php');
  include_once('./dbConnection.php');
?> 

<main class="" id="">
<section class=" mb-6" id="section-1">

  <div class="container-fluid py-5 home1">
    <div class="row align-items-center">
      <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end">
        <img class="w-100" src="public/assets/aa.png"   alt="hero-header" />
      </div>
      <div class="col-md-7 col-lg-6 text-md-start text-center cc py-6">
        <h1 class="fs-6 fs-xl-7 mb-5 ml3">Broaden your knowledge with Edusession</h1>
        <a class="btn btn-c" href="#!" role="button"> Get Started</a>
      </div>
    </div>
  </div>
  
</section>

<section class="container text-center mb-4" id="section-2">
  <div class="row ">
    <div class="col fadein">
      <h2 class="fs-1 pt-5 h-auto">Why you should choose us?</h2>
    </div>
  </div>
  <div class="row pt-5">
    <div class="col-6 fadein">
      <img src="./public/assets/goal.svg" alt="goal image" class="img">
      <h5 class="my-3">Our mission</h5>
      <p  >our mission is to encourage our students towards knowledge and to give them a solid foundation to build on. our learning platform aims to bring out the best in every student.</p>
    </div>
      <div class="col-6 fadein">
      <img src="./public/assets/value.svg" alt="goal image" class="img">
      <h5 class="my-3">Values</h5>
      <p >we are committed to providing a positive, stimulating and interactive environment for the students where all are valued .</p>
    </div>
  
    <div class="col-6 fadein">
      <img src="./public/assets/target.svg" alt="goal image" class="img">
      <h5 class="my-3">Aim</h5>
      <p >our learning center exists to provide developmental, safe and valued education environment for preschool, primary, secondary, higher secondary students as well as special training courses for competitive examinations including NEET, IIT-JEE, GATE, CAT and MHCET.</p>
    </div>
    <div class="col-6 fadein">
      <img src="./public/assets/suspect.svg" alt="goal image" class="img">
      <h5 class="my-3">Values</h5>
      <p >we are committed to providing a positive, stimulating and interactive environment for the students where all are valued .</p>
    </div>
  </div>
  
</section>

<section class="container " id="section-3">
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
</section>

<section class="" id="section-4">
  <!-- Swiper -->
  <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
           <div class="testimonalbox d-flex flex-column text-center">
             <div class="info">
                <h4 class="fs-2">Dally Serrao</h4>
                <p class="fs-6">Student </p>
             </div>
             <div class="content">
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum possimus incidunt non. Repellendus impedit rerum unde incidunt eveniet dolorem cupiditate debitis fugiat facilis. Dolore, vel distinctio error dolorum culpa deleniti?</p>
             </div>
             <div class="stars-outer fs-1">
               <div class="stars-inner"></div>
             </div>
           </div>
          </div>

          <div class="swiper-slide">
           <div class="testimonalbox d-flex flex-column text-center">
             <div class="info">
                <h4 class="fs-2">Binson Dsouza</h4>
                <p class="fs-6">Student </p>
             </div>
             <div class="content">
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum possimus incidunt non. Repellendus impedit rerum unde incidunt eveniet dolorem cupiditate debitis fugiat facilis. Dolore, vel distinctio error dolorum culpa deleniti?</p>
             </div>
             <div class="stars-outer fs-1">
               <div class="stars-inner"></div>
             </div>
           </div>
          </div>

          <div class="swiper-slide">
           <div class="testimonalbox d-flex flex-column text-center">
             <div class="info">
                <h4 class="fs-2">Unknown</h4>
                <p class="fs-6">Faculty </p>
             </div>
             <div class="content">
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum possimus incidunt non. Repellendus impedit rerum unde incidunt eveniet dolorem cupiditate debitis fugiat facilis. Dolore, vel distinctio error dolorum culpa deleniti?</p>
             </div>
             <div class="stars-outer fs-1">
               <div class="stars-inner"></div>
             </div>
           </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
</section>

<section  id="section-5">
  <div class="container-fluid" id="myGroup">
    <div class="row text-center ">
      <h1 class="display-1 mb-5">Courses</h1>
    </div>
    
      <div class="row pb-5 text-center">
        <div class="col-4 course-img  " data-bs-toggle="collapse" href="#coursePrimaryCollapse" role="button" aria-expanded="false" aria-controls="coursePrimaryCollapse">
          <div class="img-back">
            <img src="public/assets/c1.png" alt="course-1 image">
          </div>
          <h2 class="py-4">Primary School</h2>
        </div>
        <div class="col-4  course-img " data-bs-toggle="collapse" href="#courseHighCollapse" role="button" aria-expanded="false"  aria-controls="courseHighCollapse">
        <div class="img-back">
            <img src="public/assets/c2.png" alt="course-2 image">
          </div>
          <h2 class="py-4">High School School</h2>
        </div>
        <div class="col-4 course-img " data-bs-toggle="collapse" href="#courseSecondaryCollapse" role="button" aria-expanded="false"  aria-controls="courseSecondaryCollapse">
          <div class="img-back">
            <img src="public/assets/c3.png" alt="course-3 image">
          </div>
          <h2 class="py-4">Higher Secondary School</h2>
        </div>
      </div>
      <div class="row ">
        <div class="col" >
          <!-- For primary -->
          <div class="collapse multi-collapse" data-bs-parent="#myGroup" id="coursePrimaryCollapse">
            <div class="card card-body bg-grey ">
              <div class="" id="c_selection ">
                <form action="" method="POST" class="courseForm">
                  <input type="hidden" value="1" name="course_id">
                  <!-- selecting boards -->
                  <p class="fs-3 mb-2">Select Board</p>
                  <div class="d-flex flex-wrap justify-content-start">
                    <?php
                      $query = 'SELECT DISTINCT board.board_id,board.board_name FROM assign_course 
                            LEFT JOIN board ON assign_course.board_id = board.board_id 
                            WHERE assign_course.course_id = "1";';
                      $result = $conn->query($query);
                      while($row = $result->fetch_assoc()){
                        echo '
                            <div class="board-container">
                            <span class="p-1">'.$row['board_name'].'</span> 
                            <input type="radio" value="'.$row['board_id'].'" name="board">
                          </div>
                        ';
                      }
                    ?>
                    </div>

                  <!-- selecting Class -->
                  <p class="fs-3 mb-2">Select Class</p>
                  <div class="d-flex flex-wrap justify-content-start">
                  <?php
                      $query = 'SELECT DISTINCT class.class_id,class.class_name FROM assign_course 
                      LEFT JOIN class ON assign_course.class_id = class.class_id 
                      WHERE assign_course.course_id = "1";';
                      $result = $conn->query($query);
                      while($row = $result->fetch_assoc()){
                        echo '
                        <div class="board-container">
                          <span class="p-2">'.$row['class_name'].'</span> 
                          <input type="radio" value="'.$row['class_id'].'" name="class">
                        </div>
                        ';
                      }
                    ?>
                    
                    
                  </div>
                  <button class="btn btn-outline-primary m-3" type="submit" >Search</button>
                </form>
                 <!-- displaying the subjects  -->
                <table class="table table-striped table-dark table-bordered table-hover text-center">
                  <thead>
                    <th>#</th>
                    <th>Subject Name</th>
                    <th>Enrol</th>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
              </div>
            </div>

          <!-- For High School -->
          <div class="collapse multi-collapse" data-bs-parent="#myGroup" id="courseHighCollapse">
            <div class="card card-body bg-grey ">
              <div class="" id="c_selection ">
              <form action="" method="POST" class="courseForm">
              <input type="hidden" value="2" name="course_id">
                <!-- selecting boards -->
                <p class="fs-3 mb-2">Select Board</p>
                <div class="d-flex flex-wrap justify-content-start">
                <?php
                    $query = 'SELECT DISTINCT board.board_id,board.board_name FROM assign_course 
                          LEFT JOIN board ON assign_course.board_id = board.board_id 
                          WHERE assign_course.course_id = "2";';
                    $result = $conn->query($query);
                    while($row = $result->fetch_assoc()){
                      echo '
                          <div class="board-container">
                          <span class="p-1">'.$row['board_name'].'</span> 
                          <input type="radio" value="'.$row['board_id'].'" name="board">
                        </div>
                      ';
                    }
                  ?>
                </div>

                <!-- selecting Class -->
                <p class="fs-3 mb-2">Select Class</p>
                <div class="d-flex flex-wrap justify-content-start">
                  <?php
                      $query = 'SELECT DISTINCT class.class_id,class.class_name FROM assign_course 
                      LEFT JOIN class ON assign_course.class_id = class.class_id 
                      WHERE assign_course.course_id = "2";';
                      $result = $conn->query($query);
                      while($row = $result->fetch_assoc()){
                        echo '
                        <div class="board-container">
                          <span class="p-2">'.$row['class_name'].'</span> 
                          <input type="radio" value="'.$row['class_id'].'" name="class">
                        </div>
                        ';
                      }
                    ?>
                </div>
                <button class="btn btn-outline-primary m-3" type="submit"  >Search</button>
              </form>
              <!-- displaying the subjects  -->
              <table class="table table-striped table-dark table-bordered table-hover text-center">
                <thead>
                  <th>#</th>
                  <th>Subject Name</th>
                  <th>Enrol</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              </div>
            </div>
          </div>

          <!-- For Secondary -->
          <div class="collapse multi-collapse" data-bs-parent="#myGroup" id="courseSecondaryCollapse">
            <div class="card card-body bg-grey ">
              <div class="" id="c_selection ">
                <form action="" method="POST" class="courseForm">
                  <input type="hidden" value="3" name="course_id">
                  <!-- selecting boards -->
                  <p class="fs-3 mb-2">Select Board</p>
                  <div class="d-flex flex-wrap justify-content-start">
                  <?php
                      $query = 'SELECT DISTINCT board.board_id,board.board_name FROM assign_course 
                            LEFT JOIN board ON assign_course.board_id = board.board_id 
                            WHERE assign_course.course_id = "3";';
                      $result = $conn->query($query);
                      while($row = $result->fetch_assoc()){
                        echo '
                            <div class="board-container">
                            <span class="p-1">'.$row['board_name'].'</span> 
                            <input type="radio" value="'.$row['board_id'].'" name="board">
                          </div>
                        ';
                      }
                    ?>
                  </div>

                  <!-- selecting Class -->
                  <p class="fs-3 mb-2">Select Class</p>
                  <div class="d-flex flex-wrap justify-content-start">
                  <?php
                      $query = 'SELECT DISTINCT class.class_id,class.class_name FROM assign_course 
                      LEFT JOIN class ON assign_course.class_id = class.class_id 
                      WHERE assign_course.course_id = "3";';
                      $result = $conn->query($query);
                      while($row = $result->fetch_assoc()){
                        echo '
                        <div class="board-container">
                          <span class="p-2">'.$row['class_name'].'</span> 
                          <input type="radio" value="'.$row['class_id'].'" name="class">
                        </div>
                        ';
                      }
                    ?>
                  </div>
                  <button class="btn btn-outline-primary m-3" type="submit"  >Search</button>
                </form>
                <!-- displaying the subjects  -->
                <table class="table table-striped table-dark table-bordered table-hover text-center">
                  <thead>
                    <th>#</th>
                    <th>Subject Name</th>
                    <th>Enrol</th>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!--Col End -->
      </div><!--row End -->
      
    </form>
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

  <?php include('./mainInclude/footer.php'); ?>

