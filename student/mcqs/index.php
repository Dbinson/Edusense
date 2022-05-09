<style>
    .msg {
        height: 200px;
        line-height: 200px;
        text-align: center;
    }

    .msg span {
        display: inline-block;
        vertical-align: middle;
        line-height: normal;
    }

    .aa {
        height: 40vmin;
    }
</style>

<?php
if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'MCQs');
define('PAGE', 'mcq');
include('../mainInclude/header.php');
include('../../dbConnection.php');

if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='../../index.php'; </script>";
}
?>

<section id="content">
    <div class="container p-4">
        <h3>New MCQs</h3>
        <div class="aa m-4">
            <?php
            $sql = "SELECT mcq.mcq_id,subject.name,subject.class FROM mcq 
        LEFT JOIN subject ON mcq.subject_id = subject.subject_id
            WHERE mcq.student_id = '" . $_SESSION['student_id'] . "' AND mcq.marks_scored IS NULL
        ";

            $query = mysqli_query($conn, $sql);
            if ($query) {
                if (mysqli_num_rows($query) >= 1) {
                    while ($r = mysqli_fetch_assoc($query)) {
                        echo '
                        <div class="card w-100">
                            <a href="./mcq.php?id='.$r['mcq_id'].'">
                                <div class="card-body t">
                                <h5 class="card-title fs-2">' . $r['name'] . '</h5>
                                <p class="card-text">class: ' . $r['class'] . '</p>
                                </div>
                            </a>
                        </div>
                    ';
                    }
                } else {
                    echo '<div class="msg ">
                        <span>NOTHING IS ASSIGNED</span>
                    </div>
                    ';
                }
            }
            ?>
        </div>
        <h3>Completed MCQs</h3>
        <div class="aa m-4">
            <?php
            $sql = "SELECT mcq_id FROM mcq
                LEFT JOIN subject ON mcq.subject_id = subject.subject_id 
                WHERE student_id = '" . $_SESSION['student_id'] . "'  AND mcq.marks_scored IS NOT NULL
            ";

            $query = mysqli_query($conn, $sql);
            if ($query) {
                if (mysqli_num_rows($query) >= 1) {
                    while ($r = mysqli_fetch_assoc($query)) {
                        echo '
                            <div class="card w-100">
                                <a href="#">
                                    <div class="card-body t">
                                    <h5 class="card-title fs-2">' . $r['name'] . '</h5>
                                    <p class="card-text">class: ' . $r['class'] . '</p>
                                    </div>
                                </a>
                            </div>
                        ';
                    }
                } else {
                    echo '<div class="msg ">
                            <span>Nothing to show</span>
                        </div>
                        ';
                }
            }
            ?>
        </div>
    </div>
</section>

<?php include('../mainInclude/footer.php'); ?>