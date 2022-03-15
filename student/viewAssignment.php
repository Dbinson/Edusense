<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../index.css" />
    <script src="https://kit.fontawesome.com/08917cd252.js" crossorigin="anonymous"></script>


    <?php
     include("../dbConnection.php");
    ?>


  </head>
  <body>
    <section class="columns section">
      <button class="rows section-back-btn" onclick="history.back()">
        <i class="fa-solid fa-angle-left"></i>
        Back
      </button>

      <?php

        $isSubmitted=$_GET['s'];
                $sql=mysqli_query($conn, "SELECT* from assignment WHERE aid='".$_GET['aid']."';");
                while($result= mysqli_fetch_assoc($sql)){

                   
                    ?>


     <h1>
           <?php 
            echo $result["aname"];
            ?>
            
      </h1>


      <p class="deadline">
            <?php 
            if($isSubmitted==30){
              $d=strtotime( $result["enddate"]);
              echo "DUE DATE: ".date(" F d, Y h:i A", $d);
            }elseif($isSubmitted == 50){
              $sd = mysqli_query($conn,"SELECT assignment_submission.submition_date FROM assign_assignment 
                    LEFT JOIN assignment_submission ON assign_assignment.assig_submition_id = assignment_submission.assi_submit_id
                    WHERE assign_a_id='".$_GET['assign_id']."';");
                    while($a=mysqli_fetch_assoc($sd)){
              echo "Submitted On: ".$a['submition_date'] ;
                    }
            }else{
              $d=strtotime( $result["enddate"]);
              echo "Overdue: ".date(" F d, Y h:i A", $d);
            }
            ?>
      </p>


      <h2>Instructions</h2>

      <p class="instructions">
         <?php 
           echo $result["adesc"];
         ?>
      </p>
     
      
      <h2>Reference Materials</h2>
      <div class="rows card">
        <i class="fa-solid fa-file-word"></i>
        <div class="rows card-title">
          <h2>
          <?php 
           echo $result["filename"];
         ?>
          </h2>
        </div>
        <i class="fa-solid fa-cloud-arrow-down"></i>
      </div>
        <?php
                }
      ?>

      <h2>My work</h2>
      <div class="rows card">

          <?php
                $sql=mysqli_query($conn, "SELECT* from assignment_submission WHERE aid='".$_GET['aid']."';");
                if(mysqli_num_rows($sql)==0){
                  //CHECKS IF THE SUBMISSION IS DONE 
                  echo '
                  </div>';
                }else{
                while($result= mysqli_fetch_assoc($sql)){

            echo '<i class="fa-solid fa-file-word"></i>
            <div class="rows card-title">
            <h2>';
           echo $result["rfilename"];

          echo '</h2>
        </div>
        <a href="removeSubmission.php?aid='.$result['assi_submit_id'].'&file='.$result['rfile'].'"><i class="fa-solid fa-trash-can"></i></a>
      </div>';
      
                }
              }
              if($isSubmitted==30){
      ?>

            
      <div class="rows work-btns">
        <form method="post" id="sub_form" enctype="multipart/form-data">
          <input type="file" name="uploadedFile" id="uploadFile">
          <label for="uploadFile">
            <i class="fa-solid fa-link"></i>
            Attach
              </label>
              <?php
              echo '<input type="hidden" name="aid" value="'.$_GET['aid'].'">
                    <input type="hidden" name="sched_id" value="'.$_GET['sched_id'].'">
                    <input type="hidden" name="assign_id" value="'.$_GET['assign_id'].'">';
              ?>
          <button type="submit">Submit</button>
        </form>
      </div>
      <?php } ?>
    </section>

    <script
      src="https://kit.fontawesome.com/915fb40dfa.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
      $(document).ready(function (e) {
      $("#sub_form").on('submit',(function(e) {
        e.preventDefault()

        console.log(document.getElementsByName('uploadedFile').values())
        $.ajax({
          url:"addSubmission.php",
          type:"post",
          data: new FormData(this),
          processData: false,
          contentType: false,
          success: function (data){
            location.reload();
          }
        });
      }));
      });

    </script>
  </body>
</html>
