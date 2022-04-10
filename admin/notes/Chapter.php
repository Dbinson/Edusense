<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('PAGE', 'viewAssignment');
    include('./mainInclude/header.php');
    include('../dbConnection.php');

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='./index.php'; </script>";
    //    }
    

    if(isset($_REQUEST['submitBtn'])){

        

	$book_id=json_decode($_POST['book_id']);
	$chapterName =  $_POST['chapterName'];
	$chapterNo = json_decode ($_POST['chapterNo']);
	$chapterFile = json_decode( $_POST['chapterFile']);

    $check=mysqli_query($conn,"SELECT book_id,chapter_name from chapter where book_id='".$book_id."'  AND chapter_name='".$chapterName."';");

    
	if(!mysqli_num_rows($check)>0){
	
$sql=mysqli_query($conn, "INSERT INTO chapter ( chapter_name, chapter_number, chapter_file, book_id) VALUES ('".$chapterName."','".$chapterNo."','".$chapterFile."' ,'".$book_id."');");
	

	if($sql){
		echo' 1';
	}else{
		echo "0 " ;
	}
	}else{

		echo" already exists";
	}
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">
            <?php
// include("../dbConnection.php");
            $sql=mysqli_query($conn,"SELECT * from chapter where book_id = '".$book_id."';");
            $count=0;
         
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
            while($result=mysqli_fetch_assoc($sql)){
              $count++;
              echo'
              <tr>
              
              <th scope="row">'.$count.'</th>
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
        echo $book_id;
         echo '   <input type="hidden" name="id"value="'.$book_id.'" id="bid"> ';

?>
  
                    
                  </tbody>
                </table>
            </div>
        </div>
    </div>
       
</section>
</div>