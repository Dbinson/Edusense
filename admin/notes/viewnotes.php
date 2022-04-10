<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  define('TITLE','Book');
  define('PAGE', 'viewAssignment');
  include('../mainInclude/header.php');
  include('../../dbConnection.php');
  include('../modals/addBookmodal.php');

  // if(!isset($_SESSION['is_admin_login'])){
  //     echo "<script> location.href='./index.php'; </script>";
  //    }

  $book_id= $_GET["book_id"];
?>


<section id="content">
    <div class="container p-4">

        <div class="card" style="width: 55rem;margin:auto;">
            <div class="card-body">

            <div class="column admin-card">
            <div class="row admin-mybooks-header">
                <h2>Chapters</h2>
                <button type="button" class="btn btn-primary" data-bs-target="#addChapterModalCenter" data-bs-toggle="modal" >Add</button>
           
                
            </div>
            
            <?php
              $sql="SELECT * from chapter where book_id = '".$book_id."'";
              $query = $conn->query($sql);
          ?>

          <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Chapter.NO</th>
              <th scope="col">Chapter.Name</th>
            </tr>
          </thead>
          <tbody>
                <?php
                $count=1;
            while($result = $query->fetch_assoc()){
              echo'
              <tr>
              
              <th scope="row">'.$count++.'</th>
              <td>'.$result["chapter_number"].'</td>
              
              <td>'.$result["chapter_name"].'</td>

              <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewChapterModal">view chapter </button></td>
              
              <td><button class="btn btn-success editChaptersBtn">Edit </button></td>

              <td><a href ="removeRequest.php?Request_id='.$result["chapter_id"].'&request_type=chapter" type="button" class="btn  btn-danger" ><i class="fas fa-trash-alt"></i> </a></td>

            <td><input type="hidden" name="id"value="'.$result["chapter_id"].'" id="id"></td>
            
              
            </tr>

            
          '; 
          $cn=$result["chapter_name"];
          $content=$result["chapter_file"];
          
        }
         echo '   <input type="hidden" name="id"value="'.$book_id.'" id="bid"> ';

?>               
                  </tbody>
                </table>
                    
        </div>
            </div>
        </div>
    </div>

</section>
</div>
    


    <script src="../js/s.js"></script>





<!-- VIEWCHAPTER -->

        <div class="modal fade" id="ViewChapterModal" tabindex="-1" aria-labelledby="ViewChapterModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-fullscreen-xxl-down">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ViewChapterModalLabel"><?php echo $cn;?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <object data="data:application/pdf;base64,<?php echo base64_encode($content) ?>" type="application/pdf" style="height:100%;width:100%"></object>
                                     
        </div>
        <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div> -->
        </div>
    </div>
    </div>

</body>

</html>
