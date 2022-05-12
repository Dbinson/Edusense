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
        <h1>Notes Archive</h1>
    </div>

    <?php
        $sql = "SELECT subject_id FROM enroll
             WHERE student_id = '".$_SESSION['faculty_id']."'";
        $query = mysqli_query($conn,$sql);
        echo '<section class="row books-section">';
        while($result = mysqli_fetch_assoc($query)){
            $sql2 = "SELECT * FROM mst_notes 
                LEFT JOIN subject ON subject.subject_id = subject.subject_id
                WHERE mst_notes.subject_id = '".$result['subject_id']."'";
            $query2 = mysqli_query($conn,$sql2);
            // print_r($result);
            while($re = mysqli_fetch_assoc($query2)){
                // print_r($re);
            echo '
                <div class="dflex">
                    <div class="card w-50">
                        <div class="card-body text-center">
                            <h4 class="card-title">'.$re['name'].'</h4>
                            <p class="card-text">class: '.$re['class'].'</p>
                            <a href="'.$re['filename'].'" target="_blank" class="btn btn-outline-info">View</a>
                        </div>
                    </div>
                </div>
                ';
            }
            // echo '</h2></a>';
        }
        echo '</section>';
    ?>

    <?php include('../mainInclude/footer.php'); ?>  