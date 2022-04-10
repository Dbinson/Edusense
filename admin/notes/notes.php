<?php

if (!isset($_SESSION)) {
    session_start();
}
define('TITLE','Book');
define('PAGE', 'viewAssignment');
include('../mainInclude/header.php');
include('../../dbConnection.php');
include('../modals/addBookmodal.php');

if(!isset($_SESSION['is_admin_login'])){
    // echo "<script> location.href='./index.php'; </script>";
   }


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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModalCenter">
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

                            $sql = "SELECT notes_id, notes.subject_id, chapter_no, subject.class, filename FROM notes
                                        LEFT JOIN subject ON notes.subject_id = subject.subject_id
                                       ";
                            $query = mysqli_query($conn, $sql);

                            $count = 0;
                            while ($result = mysqli_fetch_assoc($query)) {
                                // print_r($result);
                                $count++;
                                echo "<th scope='row'>" . $count . "</th>
                                    <td>" . $result['subject_name'] . "</td>
                                    <td>" . $result['class'] . "</td>";
                                echo '
                                    <td> 
                                    <input type="hidden" name="id"value="' . $result["book_id"] . '" id="id">
                                    </td>
                                    <td>
                                        <a href="viewbook.php?book_id=' . $result["book_id"] . '"  class="btn btn-primary btn-sm" >View Book</a>
                                    </td>
                                    <td>
                                        <button name="editbookbtn"  class="btn btn-success btn-sm editbookbtn" >Edit Book</button>

                                    </td>
                                    <td>
                                        <a href ="removeRequest.php?Request_id=' . $result["book_id"] . '" &request_type=book" class="btn btn-danger btn-sm" type="submit">Remove Book</a>
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