<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Mcq');
    define('PAGE', 'mcq');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }
      
?>
  <form id="addMcqForm" class="column ">
    <div class="input-box">
      <div class="mb-3">
        <label for="question1" class="form-label">Q1</label>
        <input type="text" class="form-control" placeholder="Enter Question" name="question1" id="question1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="question1Option" id="question1Option1" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="question1Option" id="question1Option2" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="question1Option" id="question1Option3" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>

    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q2</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>

    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q3</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault3" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>

    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q4</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault4" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault4" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault4" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>
    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q5</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault5" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault5" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault5" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>
    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q6</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault6" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault6" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault6" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>
    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q7</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault7" id="flexRadioDefault7" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault7" id="flexRadioDefault7" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault7" id="flexRadioDefault7" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>
    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q8</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault8" id="flexRadioDefault8" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault8" id="flexRadioDefault8" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault8" id="flexRadioDefault8" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>
    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q9</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault9" id="flexRadioDefault9" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault9" id="flexRadioDefault9" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault9" id="flexRadioDefault9" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>
    <div class="input-box">
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Q10</label>
        <input type="text" class="form-control" id="exampleInputPassword1" />
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault10" id="flexRadioDefault10" />
        <input type="text" placeholder="option 1" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault10" id="flexRadioDefault10" />
        <input type="text" placeholder="option 2" />
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault10" id="flexRadioDefault10" />
        <input type="text" placeholder="option 3" />
      </div>
    </div>

    <button type="submit" class="btn btn-primary ">Add</button>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous">
  </script>
  <?php include('../mainInclude/footer.php'); ?>