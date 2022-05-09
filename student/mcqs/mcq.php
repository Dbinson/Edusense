<?php
if (!isset($_SESSION)) {
  session_start();
}
define('TITLE', 'MCQs');
define('PAGE', 'mcq');
include('../mainInclude/header.php');
include('../../dbConnection.php');

if (!isset($_SESSION['is_login'])) {
  echo "<script> location.href='../../index.php'; </script>";
}
?>

<?php

$quiz = file_get_contents('../../mcqs/' . $_GET['id'] . '.json');
$questions = json_decode($quiz, true);
?>

<div class="content-box text-center">
  <!-- <h1>Science Multiple Choice Questions</h1> -->
  <form class="container-fluid " id="mcqQuizSubmitionForm">
    <?php
    echo '
    <input type="hidden" name="id" value="'.$_GET['id'].'">
      <div class="mb-4 bg-light shadow p-3">
        <h3>1.  '.$questions['question1'].'?          <span class="fs-5">('.$questions['marks1'].'mks)</span></h3>
        
        <div class="form-check mb-3 w-40">
          <input type="radio" required name="q1" id="q1" />
          <label for="q1">'.$questions['question10option1Text'].'</label>
        </div>
        <div class="form-check mb-3">
          <input type="radio"required name="q1" id="q1" />
          <label for="q1">'.$questions['question10option2Text'].'</label>
        </div>
        <div class="form-check mb-3">
          <input type="radio"required name="q1" id="q1" />
          <label for="q1">'.$questions['question10option3Text'].'</label>
        </div>
      </div>
      ';
    ?>
    <button class="btn btn-primary">Submit</button>
  </form>
</div>

<script >

  $("#mcqQuizSubmitionForm").on('submit', function () {
    $.ajax({
      type: "post",
      url: "url",
      data: new FormData(this),
      success: function (data) {
        console.log(data)
      }
    });
  });
</script>

<?php include('../mainInclude/footer.php'); ?>