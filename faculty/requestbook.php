
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

    
}


?>
<section id="content">
<div class="container p-4">
   
    <div class="card" style="width: 35rem;margin:auto;">
        <div class="card-body">


        <div class="row archive-title">
        <h1>My Books</h1>
    </div>

    <?php

        $qEnroll =mysqli_query($conn,"SELECT faculty_id,subject_id FROM enroll_subject WHERE faculty_id = 11");
        echo '<section class="row books-section">';
        while($result=mysqli_fetch_assoc($qEnroll)){
            $qBook=mysqli_query($conn,"SELECT book_id,book_image,subject_name,subject.subject_id,class_name FROM books 
                LEFT JOIN subject ON books.subject_id = subject.subject_id
                LEFT JOIN class ON books.class_id = class.class_id
                WHERE books.subject_id = ".$result['subject_id']);
            // print_r($result);
            while($re=mysqli_fetch_assoc($qBook)){
                // print_r($re);
            echo '
                <a href="book.php?bookId='.$re['book_id'].'&subjectName='.$re['subject_name'].'&className='.$re['class_name'].'&subjectid='.$re['subject_id'].'" class="column book-card">';
                //Displaying the image
                echo '<img src="data:image/jpeg;base64,'.base64_encode($re['book_image']).'" alt="Cover image">';
            echo '<h2>'.$re["subject_name"].' '.$re['class_name'].' Book';
            }
            echo '</h2></a>';
        }
        echo '</section>';
    ?>

            </div>
        </div>
    </div>
       
</section>
</div>