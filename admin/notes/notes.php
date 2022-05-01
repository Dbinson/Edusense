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

// if(!isset($_SESSION['is_admin_login'])){
//     echo "<script> location.href='../index.php'; </script>";
//    }


if (isset($_REQUEST['submitBtn'])) {
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
                            <th scope="col">Chapter No</th>
                            <th scope="col">Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            $sql = "SELECT mst_notes_id, mst_notes.subject_id, mst_notes.chapter_no,subject.name, subject.class, filename FROM mst_notes
                                        LEFT JOIN subject ON mst_notes.subject_id = subject.subject_id
                                       ";
                            $query = mysqli_query($conn, $sql);

                            $count = 0;
                            while ($result = mysqli_fetch_assoc($query)) {
                                // print_r($result);
                                $count++;
                                echo "<th scope='row'>" . $count . "</th>
                                    <td>" . $result['name'] . "</td>
                                    <td>" . $result['chapter_no'] . "</td>

                                    <td>" . $result['class'] . "</td>";
                                echo '
                                    <td>
                                        <a href="'.$result['filename'].'"  target="_blank" class="btn btn-primary btn-sm" type="button">View</a>
                                    </td>
                                    <td>
                                        <button name="updateNotebtn"  class="btn btn-success btn-sm updateNotebtn" id="'.$result['mst_notes_id'].'" ><span class="material-icons">update</span></button>
                                    </td>
                                    <td>
                                        <a href ="#" class="btn btn-danger btn-sm deletebtn" type="button" id="'.$result['mst_notes_id'].'"><span class="material-icons">delete</span></a>
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