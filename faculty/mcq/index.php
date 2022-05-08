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
                            <select class="form-select" required name="subjectId" required id="subjectId"
                                aria-label="Default select example">
                            <option selected>Select subject </option>
                    <?php
                        include_once('../../dbConnection.php');    
                        $sql=mysqli_query($conn,"SELECT * from subject");
                        while($result=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$result['subject_id'].">".$result['name']. "  ".$result['class']."</option>";
                        }
                    ?>
                    
                </select>
                </div>

                <div class="mb-3">  
                    <label for="StudentId" class="form-label">Student</label>
                            <select class="form-select" required name="studentId" required id="student_Id"
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
              <input type="text" class="form-control" placeholder="Enter Question" required name="question1" required id="question1" />
            </div>
          
            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" required name="marks1" required id="marks1" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question1Option" required id="question1Option1" />
              <input type="text" placeholder="Option 1" name="question10option1Text" id="question1Option1Text" />
            </div>
            
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question1Option" required id="question1Option2" />
              <input type="text" placeholder="OPtion 2" name="question10option2Text" id="question1Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question1Option" required id="question1Option3" />
              <input type="text" placeholder="Option 3" name="question10option3Text" id="question1Option3Text" />
            </div>
          </div>

          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q2</label>
              <input type="text" class="form-control" required placeholder="Enter Question" required name="question2" required id="question2" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" required name="marks2" required id="marks2" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question2Option" required id="question2Option1" />
              <input type="text" placeholder="option 1" name="question20option1Text" required id="question2Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question2Option" required id="question2Option2" />
              <input type="text" placeholder="option 2" name="question20option2Text" required id="question2Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question2Option" required id="question2Option3" />
              <input type="text" placeholder="option 3" name="question20option3Text" required id="question2Option3Text" />
            </div>
          </div>

          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q3</label>
              <input type="text" class="form-control" placeholder="Enter Question" required name="question3" required id="question3" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks3" required id="marks3" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question3Option" required id="question3Option3" />
              <input type="text" placeholder="option 1" name="question30option1Text" required id="question3Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" name="question3Option" required id="question3Option3" />
              <input type="text" placeholder="option 2" name="question30option2Text" required id="question3Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question3Option" required id="question3Option3" />
              <input type="text" placeholder="option 3" name="question30option3Text" required id="question3Option3Text" />
            </div>
          </div>

          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q4</label>
              <input type="text" class="form-control" placeholder="Enter Question" name="question4" required id="question4" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" name="marks4" required id="marks4" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question4Option" required id="question4Option4" />
              <input type="text" placeholder="option 1" name="question40option1Text" required id="question4Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question4Option" required id="question4Option4" />
              <input type="text" placeholder="option 2" name="question40option2Text" required id="question4Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question4Option" required id="question4Option4" />
              <input type="text" placeholder="option 3" name="question40option3Text" required id="question4Option3Text" />
            </div>
          </div>
          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q5</label>
              <input type="text" class="form-control" placeholder="Enter Question" required name="question5" required id="question5" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" required name="marks5" required id="marks5" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question5Option" required id="question5Option5" />
              <input type="text" placeholder="option 1" name="question50option1Text" required id="question5Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question5Option" required id="question5Option5" />
              <input type="text" placeholder="option 2"  name="question50option2Text" required id="question5Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question5Option" required id="question5Option5" />
              <input type="text" placeholder="option 3"  name="question50option3Text" required id="question5Option1Text" />
            </div>
          </div>


          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q6</label>
              <input type="text" class="form-control" placeholder="Enter Question" required name="question6" required id="question6" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" required name="marks6" required id="marks6" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question6Option" required id="question6Option6" />
              <input type="text" placeholder="option 1" name="question60option1Text" required id="question6Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question6Option" required id="question6Option6" />
              <input type="text" placeholder="option 2" name="question60option2Text" required id="question6Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question6Option" required id="question6Option6" />
              <input type="text" placeholder="option 3" name="question60option3Text" required id="question6Option3Text" />
            </div>
          </div>
          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q7</label>
              <input type="text" class="form-control" placeholder="Enter Question" required name="question7" required id="question7" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" required name="marks7" required id="marks7" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question7Option" required id="question7Option7" />
              <input type="text" placeholder="option 1" name="question70option1Text" required id="question7Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question7Option" required id="question7Option7" />
              <input type="text" placeholder="option 2" name="question70option2Text" required id="question7Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio"required name="question7Option" required id="question7Option7" />
              <input type="text" placeholder="option 3" name="question70option3Text" required id="question7Option3Text" />
            </div>
          </div>


          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q8</label>
              <input type="text" class="form-control" placeholder="Enter Question" required name="question8" required id="question8" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" required name="marks8" required id="marks8" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question8Option" required id="question8Option8" />
              <input type="text" placeholder="option 1" name="question80option1Text" required id="question8Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question8Option" required id="question8Option8" />
              <input type="text" placeholder="option 2" name="question80option2Text" required id="question8Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question8Option" required id="question8Option8" />
              <input type="text" placeholder="option 3" name="question80option3Text" required id="question8Option3Text" />
            </div>
          </div>


          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q9</label>
              <input type="text" class="form-control" placeholder="Enter Question" required name="question9" required id="question9" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" required name="marks9" required id="marks9" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question9Option" required id="question9Option9" />
              <input type="text" placeholder="option 1" name="question90option1Text" required id="question9Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question9Option" required id="question9Option9" />
              <input type="text" placeholder="option 2" name="question90option2Text" required id="question9Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question9Option" required id="question9Option9" />
              <input type="text" placeholder="option 3" name="question90option3Text" required id="question9Option3Text" />
            </div>
          </div>
          <div class="input-box">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Q10</label>
              <input type="text" class="form-control" placeholder="Enter Question" required name="question10" required id="question10" />
            </div>

            <div class=" mb-3">
              <label for="question1" class="form-label">Marks</label>
              <input type="number" class="form-control" placeholder="Enter Marks" required name="marks10" required id="marks10" />
            </div>

            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question10Option" required id="question10Option10" />
              <input type="text" placeholder="option 1" name="question100option1Text" required id="question10Option1Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question10Option" required id="question10Option10" />
              <input type="text" placeholder="option 2" name="question100option2" required id="question10Option2Text" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="radio" required name="question10Option" required id="question10Option10" />
              <input type="text" placeholder="option 3" name="question100option3" required id="question10Option3Text" />
            </div>
          </div>

          <button type="submit" class="btn btn-primary ">Add</button>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="../js/mcqAjax.js"></script>
<?php include('../mainInclude/footer.php'); ?>