<?php
if (!isset($_SESSION)) {
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

<div class="row archive-title">
        <h1>My Books</h1>
    </div>

    <?php

if(!isset($_SESSION['is_stud_login'])){
    echo "<script> location.href='../../index.php'; </script";
}
        $sql = "SELECT student_id,subject_id FROM enroll_subject WHERE student_id = ".$_SESSION['student_id'];
        $query = $conn->query($sql);
        echo '<section class="row books-section">';
        while($result = $query->fetch_assoc()){
            $sql2 = "SELECT book_id,book_image,subject_name,subject.subject_id,class_name FROM books 
            LEFT JOIN subject ON books.subject_id = subject.subject_id
            LEFT JOIN assign_course ON subject.assign_course_id = assign_course.assign_course_id
            LEFT JOIN class ON assign_course.class_id = class.class_id
            WHERE books.subject_id = ".$result['subject_id'];
            $query2 = $conn->query($sql2);
            // print_r($result);
            while($re = $query2->fetch_assoc()){
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

    <?php include('../mainInclude/footer.php'); ?>  