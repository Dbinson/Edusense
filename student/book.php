<!DOCTYPE html>
<html lang="en">
<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<?php
$_SESSION['student_id']= 102; 
$_SESSION['book_id']=$_GET['bookId'];
$_SESSION['subject_name']=$_GET['subjectName'];
$_SESSION['subject_id']=$_GET['subjectid'];
$_SESSION['class_name']=$_GET['className'];
// print_r($_SESSION);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/book.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <section class="column book-section">
        <?php
           include("../dbConnection.php");
        ?>
        <?php
            $sql=mysqli_query($conn,"SELECT * FROM chapter WHERE book_id=". $_SESSION['book_id'].";");
            // $subj = mysqli_query($conn,"SELECT * FROM subject WHERE subject_id=". $_SESSION['subject_id'].";");

            //getting the book cover image
            $bi = mysqli_query($conn,"SELECT book_image FROM books WHERE book_id=".$_SESSION['book_id']);
            while($r = mysqli_fetch_assoc($bi)){
            echo '<img src="data:image/jpeg;base64,'.base64_encode($r['book_image']).'" alt="">';
            }
                echo '
                <h1>'.$_SESSION["subject_name"].' '.$_SESSION["class_name"].' Textbook</h1>
                <p></p>';

                // fetching and printing the chapters
            while($result=mysqli_fetch_assoc($sql)){
                

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
        function sndreq(chapter_id,subject_id){
            $.ajax({url:"bookRequest.php",
                type:"POST",
                data:{
                    chapterID: chapter_id,
                    subjectID: subject_id
                },
                dataType: "text",
                success:function(result){
                    $(".requestSubmit").text(result);
                    // $(".requestSubmit").attr('disabled',true);
                },error: function(){
				    alert("Error");
			}
            });
        } 
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




    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/25e996ff89.js" crossorigin="anonymous"></script>
</body>

</html>
