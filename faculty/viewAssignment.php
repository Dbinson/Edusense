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
                $sql=mysqli_query($conn, "SELECT* from assignment WHERE aid='1';");
                while($result= mysqli_fetch_assoc($sql)){

                   
                    ?>


     <h1>
           <?php 
            echo $result["aname"];
            ?>
            
      </h1>

      <p class="deadline">
            <?php 
              $d=strtotime( $result["enddate"]);
              echo date(" F d, Y h:i A", $d);
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
           echo $result["rfilename"];
         ?>
          </h2>
        </div>
        <i class="fa-solid fa-cloud-arrow-down"></i>

      </div>
      
        
      <h2>My work</h2>

      <div class="rows card">
        <i class="fa-solid fa-file-word"></i>
        <div class="rows card-title">

        <?php
                }
      ?>
          <h2>

          <?php
                $sql=mysqli_query($conn, "SELECT * from assignment_submission WHERE aid='".$_GET['aid']."';");
                while($result= mysqli_fetch_assoc($sql)){

                   
                    ?>

          <?php 
           echo $result["filename"];
         ?>

          </h2>
        </div>
        <i class="fa-solid fa-trash-can"></i>
      </div>
      
      <?php
                }
      ?>

      <div class="rows work-btns">
        <button class="rows">
          <i class="fa-solid fa-link"></i>



          Attach
        </button>
        <button>Submit</button>
      </div>
    </section>

    <script
      src="https://kit.fontawesome.com/915fb40dfa.js"
      crossorigin="anonymous"
    ></script>
    
  </body>
</html>
