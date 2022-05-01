<?php
    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Book');
    define('PAGE', 'books');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_stud_login'])){
        echo "<script> location.href='../../index.php'; </script>";
    }

?>

<?php
// $_SESSION['student_id']= 102; 
// $_SESSION['book_id']=$_GET['bookId'];
// $_SESSION['subject_name']=$_GET['subjectName'];
// $_SESSION['subject_id']=$_GET['subjectid'];
// $_SESSION['class_name']=$_GET['className'];
// print_r($_SESSION);
?>
    <section class="column book-section">
        <?php
           include("../../dbConnection.php");
        ?>
        <?php
            $sql = "SELECT * FROM chapter WHERE book_id=". $_GET['bookId'];
            $query = $conn->query($sql);
            // ### $subj = mysqli_query($conn,"SELECT * FROM subject WHERE subject_id=". $_SESSION['subject_id'].";");

            //getting the book cover image
            $bi = mysqli_query($conn,"SELECT book_image FROM books WHERE book_id=".$_GET['bookId']);
            while($r = mysqli_fetch_assoc($bi)){
            echo '<img src="data:image/jpeg;base64,'.base64_encode($r['book_image']).'" alt="">';
            }
                echo '
                <h1>'.$_GET["subjectName"].' '.$_GET["className"].' Textbook</h1>
                <p></p>';

                // fetching and printing the chapters
            while($result = $query->fetch_assoc()){
                

                //assigning chapterid to session
                //$_SESSION['chapter_id'] = $result['chapter_id'];

                echo '<div class="column book-chapter-card">
                    <p>'.$result["chapter_number"].'. Chapter </p>
                    <h3>'.$result["chapter_name"].'</h3>
                ';

                //Querying tthe student chapters 
                $s = mysqli_query($conn,"SELECT student_id, request_status, chapter_id 
                        FROM student_book_request 
                        WHERE student_id = ". $_SESSION['student_id']."
                        AND chapter_id = ".$result['chapter_id']."
                        ;");

                        //checks if any request is made
                        if(mysqli_num_rows($s)>0){

                            while($row = mysqli_fetch_assoc($s)){
                                //checking if the chapter access is given or not
                            switch($row['request_status']){
                                case "pending":?>
                                
                                    <button class="requestSubmit">Request Pending</button>
                                    <?php
                                    break;
                                case "accepted":
                                    //display the Book
                                    $cn = $result['chapter_name'];
                                     $content=$result['chapter_file'];?>
                                     <!-- <object data="data:application/pdf;base64,<?php //echo base64_encode($content) ?>" type="application/pdf" style="height:200px;width:60%"></object> -->
                                     <button type="button" data-bs-toggle="modal" data-bs-target="#ViewChapterModal">View Chapter</button>
                                    <?php
                                    break;
                                case "rejected":
                                    ?>
                                    <script type="text/javascript">
                                    <?php echo 'var chtID = '.json_encode($result['chapter_id']).';';
                                        echo 'var subjId = '.json_encode($_SESSION['subject_id']).';';
                                    ?>
                                    </script>
            
                                    <button class="requestSubmit" onclick="sndreq(chtID,subjId)">Request Access</button>
                                    <?php
                                    break;

                                default:
                                    echo 'Nothing to diaplay';

                                }
                            }
                        }else{
                            ?>
                                        

                            <script type="text/javascript">
                            <?php echo 'var chtID = '.json_encode($result['chapter_id']).';';
                                echo 'var subjId = '.json_encode($_SESSION['subject_id']).';';
                            ?>
                        </script>

                        <button class="requestSubmit" onclick="sndreq(chtID,subjId)">Request Access</button>
                        <?php
                        }
                echo '</div>';
            }
        ?>

        <!-- </div> -->
    </section>

    <script>
        // function sndreq(chapter_id,subject_id){
        //     $.ajax({url:"bookRequest.php",
        //         type:"POST",
        //         data:{
        //             chapterID: chapter_id,
        //             subjectID: subject_id
        //         },
        //         dataType: "text",
        //         success:function(result){
        //             $(".requestSubmit").text(result);
        //             // $(".requestSubmit").attr('disabled',true);
        //         },error: function(){
		// 		    alert("Error");
		// 	}
        //     });
        // } 
    </script>

        <!-- View Chapter Modal -->
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

<?php include('../mainInclude/footer.php'); ?>