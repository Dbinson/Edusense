<?php

if (!isset($_SESSION)) {
  session_start();
}
define('TITLE', 'Mcq');
define('PAGE', 'mcq');
include('../mainInclude/header.php');
include('../../dbConnection.php');

if (!isset($_SESSION['is_login'])) {
  echo "<script> location.href='../index.php'; </script>";
}

?>

<section id="content">
  <div class="container p-4">


    <div class="card" style="width: 55rem;margin:auto;">
      <div class="card-body">
        
      <h3 class="text-center display-5">Create Mcq</h3>
        <form id="addMcqForm" class="" >
          <div class="input-box">

          <div class="mb-3">  
                    <label for="subjectId" class="form-label">Subject</label>
                            <select class="form-select" name="subjectId" id="subjectId"
                                aria-label="Default select example">
                            <option selected>Select subject </option>
                    <?php
                        include_once('../../dbConnection.php');    
                        $sql=mysqli_query($conn,"SELECT * from subject");
                        while($result=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$result['subject_id'].">".$result['subject_id']."</option>";
                        }
                    ?>
                    
                </select>
                </div>

                <div class="mb-3">  
                    <label for="StudentId" class="form-label">Student</label>
                            <select class="form-select" name="studentId" id="student_Id"
                                aria-label="Default select example">
                            <option selected>Select Student </option>
                    <?php
                        include_once('../../dbConnection.php');    
                        $sql=mysqli_query($conn,"SELECT student_id,stud_name from student");
                        while($result=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$result['student_id'].">".$result['stud_name']."</option>";
                        }
                    ?>
                            </select>
                </div>

          <div class="input-box">
            <div class=" mb-3">
              <label for="question1" class="form-label">Q1</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question1" id="question1" />
            </div>
          
            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks1" id="marks1" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question1Option" id="question1Option1" />
              <input type="text" placeholder="Option 1" id="question1Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question1Option" id="question1Option2" />
              <input type="text" placeholder="OPtion 2" id="question1Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question1Option" id="question1Option3" />
              <input type="text" placeholder="Option 3" id="question1Option3Text" />
            </div>
          </div>

          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q2</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question2" id="question2" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks2" id="marks2" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question2Option" id="question2Option1" />
              <input type="text" placeholder="option 1" id="question2Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question2Option" id="question2Option2" />
              <input type="text" placeholder="option 2" id="question2Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question2Option" id="question2Option3" />
              <input type="text" placeholder="option 3" id="question2Option3Text" />
            </div>
          </div>

          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q3</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question3" id="question3" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks3" id="marks3" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question3Option" id="question3Option3" />
              <input type="text" placeholder="option 1" id="question3Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question3Option" id="question3Option3" />
              <input type="text" placeholder="option 2" id="question3Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question3Option" id="question3Option3" />
              <input type="text" placeholder="option 3" id="question3Option3Text" />
            </div>
          </div>

          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q4</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question4" id="question4" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks4" id="marks4" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question4Option" id="question4Option4" />
              <input type="text" placeholder="option 1" id="question4Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question4Option" id="question4Option4" />
              <input type="text" placeholder="option 2" id="question4Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question4Option" id="question4Option4" />
              <input type="text" placeholder="option 3" id="question4Option3Text" />
            </div>
          </div>
          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q5</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question5" id="question5" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks5" id="marks5" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question5Option" id="question5Option5" />
              <input type="text" placeholder="option 1" id="question5Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question5Option" id="question5Option5" />
              <input type="text" placeholder="option 2" id="question5Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question5Option" id="question5Option5" />
              <input type="text" placeholder="option 3" id="question5Option1Text" />
            </div>
          </div>


          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q6</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question6" id="question6" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks6" id="marks6" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question6Option" id="question6Option6" />
              <input type="text" placeholder="option 1" id="question6Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question6Option" id="question6Option6" />
              <input type="text" placeholder="option 2" id="question6Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question6Option" id="question6Option6" />
              <input type="text" placeholder="option 3" id="question6Option3Text" />
            </div>
          </div>
          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q7</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question7" id="question7" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks7" id="marks7" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question7Option" id="question7Option7" />
              <input type="text" placeholder="option 1" id="question7Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question7Option" id="question7Option7" />
              <input type="text" placeholder="option 2" id="question7Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question7Option" id="question7Option7" />
              <input type="text" placeholder="option 3" id="question7Option3Text" />
            </div>
          </div>


          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q8</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question8" id="question8" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks8" id="marks8" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question8Option" id="question8Option8" />
              <input type="text" placeholder="option 1" id="question8Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question8Option" id="question8Option8" />
              <input type="text" placeholder="option 2" id="question8Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question8Option" id="question8Option8" />
              <input type="text" placeholder="option 3" id="question8Option3Text" />
            </div>
          </div>


          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q9</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question9" id="question9" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks9" id="marks9" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question9Option" id="question9Option9" />
              <input type="text" placeholder="option 1" id="question9Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question9Option" id="question9Option9" />
              <input type="text" placeholder="option 2" id="question9Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question9Option" id="question9Option9" />
              <input type="text" placeholder="option 3" id="question9Option3Text" />
            </div>
          </div>
          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q10</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question10" id="question10" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks10" id="marks10" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question10Option" id="question10Option10" />
              <input type="text" placeholder="option 1" id="question10Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question10Option" id="question10Option10" />
              <input type="text" placeholder="option 2" id="question10Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question10Option" id="question10Option10" />
              <input type="text" placeholder="option 3" id="question10Option3Text" />
            </div>
          </div>

          <button type="submit" class="btn btn-primary ">Add</button>
        </form>

      </div>
    </div>
  </div>
</section>
<?php include('../mainInclude/footer.php'); ?>