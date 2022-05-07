<?php

if (!isset($_SESSION)) {
    session_start();
}
define('TITLE','Notes');
define('PAGE', 'notes');
include('../mainInclude/header.php');
include('../../dbConnection.php');
include('../modals/addNotesModal.php');
include('../modals/updateNoteModal.php');

if(!isset($_SESSION['is_login'])){
    echo "<script> location.href='../../index.php'; </script>";
   }

?>
<section id="content">
    <div class="container p-4">


        <div class="card" style="width: 55rem;margin:auto;">
            <div class="card-body">

                <div class="row admin-mybooks-header">
                    <h2>Notes</h2>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary abutton" data-bs-toggle="modal" data-bs-target="#addNotesModalCenter">
                Add notes
                </button>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Chapter No</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            $sql = "SELECT * FROM faculty_notes
                                        LEFT JOIN subject ON faculty_notes.subject_id = subject.subject_id
                                        LEFT JOIN student ON faculty_notes.student_id = student.student_id
                                        where faculty_notes.faculty_id = '".$_SESSION['faculty_id']."'
                                       ";
                            $query = mysqli_query($conn, $sql);

                            $count = 0;
                            while ($result = mysqli_fetch_assoc($query)) {
                                $count++;
                                echo "<th scope='row'>" . $count . "</th>
                                    <td>" . $result['name'] . "</td>
                                    <td>" . $result['chapter_no'] . "</td>
                                    <td>" . $result['class'] . "</td>
                                    <td>" . $result['stud_name'] . "</td>"
                                    ;
                                echo '
                                    <td>
                                        <a href="'.$result['file_name'].'"  target="_blank" class="btn btn-primary btn-sm" type="button">View</a>
                                    </td>
                                    <td>
                                        <button name="updateNotebtn"  class="btn btn-success btn-sm updateNotebtn" id="'.$result['fac_notes_id'].'" ><span class="material-icons">update</span></button>
                                    </td>
                                    <td>
                                        <a href ="#" class="btn btn-danger btn-sm deletebtn" type="button" id="'.$result['fac_notes_id'].'"><span class="material-icons">delete</span></a>
                                    </td>
                                </tr>
                                ';
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </section>
</div>
<script src="../js/notesAjax.js"></script>

<?php include('../mainInclude/footer.php'); ?>