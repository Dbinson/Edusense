<?php

if (!isset($_SESSION)) {
    session_start();
}
define('TITLE','Notes');
define('PAGE', 'notes');
include('../mainInclude/header.php');
include('../../dbConnection.php');
include('../modals/addNotesModal.php');

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

                            $sql = "SELECT mst_notes_id, mst_notes.subject_id, chapter_no,subject.name, subject.class, filename FROM mst_notes
                                        LEFT JOIN subject ON mst_notes.subject_id = subject.subject_id
                                       ";
                            $query = mysqli_query($conn, $sql);

                            $count = 0;
                            while ($result = mysqli_fetch_assoc($query)) {
                                // print_r($result);
                                $count++;
                                echo "<th scope='row'>" . $count . "</th>
                                    <td>" . $result['name'] . "</td>
                                    <td>" . $result['class'] . "</td>";
                                echo '
                                    <td>
                                        <a href="#ViewNotesModal"  class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ViewNotesModal">View</a>
                                    </td>
                                    <td>
                                        <button name="editbookbtn"  class="btn btn-success btn-sm editbookbtn" >Edit</button>
                                    </td>
                                    <td>
                                        <a href ="removeRequest.php?Request_id=" &request_type=book" class="btn btn-danger btn-sm" type="submit">Remove</a>
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

<div class="modal fade" id="ViewNotesModal" tabindex="-1" aria-labelledby="ViewNotesModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-fullscreen-xxl-down">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ViewNotesModalLabel"><?php echo $cn;?></h5>
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
<script src="../js/notesAjax.js"></script>

<?php include('../mainInclude/footer.php'); ?>