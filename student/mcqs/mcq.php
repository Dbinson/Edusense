<link rel="stylesheet" href="../feedback/rate.css">
<link rel="stylesheet" href="../feedback/style.css">


<?php
if (!isset($_SESSION)) {
  session_start();
}
define('TITLE', 'MCQs');
define('PAGE', 'mcq');
include('../mainInclude/header.php');
include('../../dbConnection.php');
include('../modal/addFeedbackModal.php');

if (!isset($_SESSION['is_login'])) {
  echo "<script> location.href='../../index.php'; </script>";
}
?>

<?php

$quiz = file_get_contents('../../mcqs/' . $_GET['id'] . '.json');
$questions = json_decode($quiz, true);
?>

<div class="content-box">
  <!-- <h1>Science Multiple Choice Questions</h1> -->
  <form class="container-fluid " id="mcqQuizSubmitionForm">
    <?php
    echo '
    <input type="hidden" name="id" value="' . $_GET['id'] . '">
      <div class="mb-4 bg-light shadow p-3">
        <h3>1.  ' . $questions['question1'] . '          <span class="fs-5">(' . $questions['marks1'] . 'mks)</span></h3>
        
        <div class="form-check mb-3 w-40">
          <input type="radio" value="1"  required name="q1" />
          <label for="q1">' . $questions['question10option1Text'] . '</label>
        </div>
        <div class="form-check mb-3">
          <input type="radio" value="2" required name="q1" />
          <label for="q1">' . $questions['question10option2Text'] . '</label>
        </div>
        <div class="form-check mb-3">
          <input type="radio" value="3" required name="q1" />
          <label for="q1">' . $questions['question10option3Text'] . '</label>
        </div>
      </div>



      <div class="mb-4 bg-light shadow p-3">
      <h3>2.  ' . $questions['question2'] . '          <span class="fs-5">(' . $questions['marks2'] . 'mks)</span></h3>
      
      <div class="form-check mb-3 w-40">
        <input type="radio" value="1"  required name="q2" " />
        <label for="q2">' . $questions['question20option1Text'] . '</label>
      </div>
      <div class="form-check mb-3">
        <input type="radio" value="2" required name="q2" " />
        <label for="q2">' . $questions['question20option2Text'] . '</label>
      </div>
      <div class="form-check mb-3">
        <input type="radio" value="3" required name="q2" " />
        <label for="q1">' . $questions['question20option3Text'] . '</label>
      </div>
    </div>

    <div class="mb-4 bg-light shadow p-3">
    <h3>3.  ' . $questions['question3'] . '          <span class="fs-5">(' . $questions['marks3'] . 'mks)</span></h3>
    
    <div class="form-check mb-3 w-40">
      <input type="radio" value="1"  required name="q3" id="q3" />
      <label for="q3">' . $questions['question30option1Text'] . '</label>
    </div>
    <div class="form-check mb-3">
      <input type="radio" value="2" required name="q3" />
      <label for="q1">' . $questions['question30option2Text'] . '</label>
    </div>
    <div class="form-check mb-3">
      <input type="radio" value="3" required name="q3" />
      <label for="q1">' . $questions['question30option3Text'] . '</label>
    </div>
  </div>

  <div class="mb-4 bg-light shadow p-3">
  <h3>4.  ' . $questions['question4'] . '          <span class="fs-5">(' . $questions['marks4'] . 'mks)</span></h3>
  
  <div class="form-check mb-3 w-40">
    <input type="radio" value="1"  required name="q4" />
    <label for="q1">' . $questions['question40option1Text'] . '</label>
  </div>
  <div class="form-check mb-3">
    <input type="radio" value="2" required name="q4" />
    <label for="q1">' . $questions['question40option2Text'] . '</label>
  </div>
  <div class="form-check mb-3">
    <input type="radio" value="3" required name="q4" />
    <label for="q1">' . $questions['question40option3Text'] . '</label>
  </div>
</div>


<div class="mb-4 bg-light shadow p-3">
<h3>5.  ' . $questions['question5'] . '          <span class="fs-5">(' . $questions['marks5'] . 'mks)</span></h3>

<div class="form-check mb-3 w-40">
  <input type="radio" value="1"  required name="q5" />
  <label for="q1">' . $questions['question50option1Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="2" required name="q5" />
  <label for="q1">' . $questions['question50option2Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="3" required name="q5" />
  <label for="q1">' . $questions['question50option3Text'] . '</label>
</div>
</div>

<div class="mb-4 bg-light shadow p-3">
<h3>6.  ' . $questions['question6'] . '          <span class="fs-5">(' . $questions['marks6'] . 'mks)</span></h3>

<div class="form-check mb-3 w-40">
  <input type="radio" value="1"  required name="q6" />
  <label for="q1">' . $questions['question60option1Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="2" required name="q6" />
  <label for="q1">' . $questions['question60option2Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="3" required name="q6" />
  <label for="q1">' . $questions['question60option3Text'] . '</label>
</div>
</div>

<div class="mb-4 bg-light shadow p-3">
<h3>7.  ' . $questions['question7'] . '          <span class="fs-5">(' . $questions['marks7'] . 'mks)</span></h3>

<div class="form-check mb-3 w-40">
  <input type="radio" value="1"  required name="q7" />
  <label for="q1">' . $questions['question70option1Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="2" required name="q7" />
  <label for="q1">' . $questions['question70option2Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="3" required name="q7" />
  <label for="q1">' . $questions['question70option3Text'] . '</label>
</div>
</div>

<div class="mb-4 bg-light shadow p-3">
<h3>8.  ' . $questions['question8'] . '          <span class="fs-5">(' . $questions['marks8'] . 'mks)</span></h3>

<div class="form-check mb-3 w-40">
  <input type="radio" value="1"  required name="q8" />
  <label for="q1">' . $questions['question80option1Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="2" required name="q8" />
  <label for="q1">' . $questions['question80option2Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="3" required name="q8" />
  <label for="q1">' . $questions['question80option3Text'] . '</label>
</div>
</div>

<div class="mb-4 bg-light shadow p-3">
<h3>9.  ' . $questions['question9'] . '          <span class="fs-5">(' . $questions['marks9'] . 'mks)</span></h3>

<div class="form-check mb-3 w-40">
  <input type="radio" value="1"  required name="q9" />
  <label for="q1">' . $questions['question90option1Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="2" required name="q9" />
  <label for="q1">' . $questions['question90option2Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="3" required name="q9" />
  <label for="q1">' . $questions['question90option3Text'] . '</label>
</div>
</div>

<div class="mb-4 bg-light shadow p-3">
<h3>10.  ' . $questions['question10'] . '          <span class="fs-5">(' . $questions['marks10'] . 'mks)</span></h3>

<div class="form-check mb-3 w-40">
  <input type="radio" value="1"  required name="q10" />
  <label for="q1">' . $questions['question100option1Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="2" required name="q10" />
  <label for="q1">' . $questions['question100option2Text'] . '</label>
</div>
<div class="form-check mb-3">
  <input type="radio" value="3" required name="q10" />
  <label for="q1">' . $questions['question100option3Text'] . '</label>
</div>
</div>
<input type="hidden" name="mId" value="'.$_GET['id'].'">
      ';
    
    ?>
    
    <button class="btn btn-primary" type="submit">Submit</button>
    <span id="successmsg"></span>
  </form>
</div>

<!-- Modal to display result -->
<div class="modal fade" id="displayScoreModal" tabindex="-1" aria-labelledby="displayScoreModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="displayScoreModalLabel">Test Score </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="modalContent " style="text-align:center;">
            <h1 class="display-4 sss "></h1>
            <button class="btn btn-outline-info"  data-bs-toggle="modal" data-bs-target="#feedbackModal" > Give Feedback about the Subject </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $("#mcqQuizSubmitionForm").on('submit', function(e) {
    $.ajax({
      type: "post",
      url: "./submitionProcess.php",
      dataType: "json",
      processData: false,
      contentType: false,
      data: new FormData(this),
      success: function(data) {
        console.log(data)
        if(data[3] == 1){
          $('#displayScoreModal').modal('show')
          $('.sss').html('Scored <br>' + data[2] + '/' + data[1])

        }
      }
    });
    e.preventDefault();
  });


	// add feedback
</script>

<?php include('../mainInclude/footer.php'); ?>