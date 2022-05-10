<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    define('TITLE','Notes');
    define('PAGE', 'notes');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_login'])){
         echo "<script> location.href='../../index.php'; </script>";
       }
?>

    <div class="row archive-title">
        <h1>Notes</h1>
    </div>

    <?php
        $sql = "SELECT * FROM faculty_notes
            LEFT JOIN faculty ON faculty_notes.faculty_id = faculty.faculty_id
            LEFT JOIN subject ON subject.subject_id = subject.subject_id
             WHERE faculty_notes.student_id = '".$_SESSION['student_id']."'";
        $query = mysqli_query($conn,$sql);
        echo '<section class="row books-section">';
        while($result = mysqli_fetch_assoc($query)){
            echo '
                <div class="dflex">
                    <div class="card w-50">
                        <div class="card-body text-center">
                            <h4 class="card-title">'.$result['name'].'</h4>
                            <p class="card-text">class: '.$result['class'].'
                                faculty: '.$result['faculty_name'].'
                            </p>
                            <a href="'.$result['file_name'].'" target="_blank" class="btn btn-outline-info">View</a>
                        </div>
                    </div>
                </div>
                ';
            }
        echo '</section>';
    ?>

    <?php include('../mainInclude/footer.php'); ?>  