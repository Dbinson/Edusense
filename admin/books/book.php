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
                    <h2>My Books</h2>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModalCenter">
                Add Book
                </button>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Chapter No</th>
                            <th scope="col">Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            $sql = "SELECT * FROM books
                                        LEFT JOIN subject ON books.subject_id = subject.subject_id
                                        LEFT JOIN  assign_course ON subject.assign_course_id = assign_course.assign_course_id
                                        LEFT JOIN  class ON assign_course.class_id = class.class_id";
                            $query = $conn->query($sql);

                            $book_data = array();

                            $count = 0;
                            while ($result = $query->fetch_assoc()) {
                                $book_data[] = $result;
                                // print_r($result);
                                $count++;
                                echo "<th scope='row'>" . $count . "</th>";
                                echo "<td>" . $result['subject_name'] . "</td>";
                                $sql2 = "SELECT COUNT(book_id),book_id FROM chapter GROUP BY book_id";
                                $query2 = $conn->query($sql2);

                                while ($re = $query2->fetch_assoc()) {

                                    if ($result['book_id'] == $re['book_id']) {
                                        echo "<td>" . $re['COUNT(book_id)'] . "</td>";
                                    }
                                }
                                echo "<td>" . $result['class_name'] . "</td>";
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

                            //write to json file
                            // $fp = fopen('book_data.json', 'w');
                            // fwrite($fp, json_encode($book_data));
                            // fclose($fp);

                            ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</section>
</div>
<script src="../js/bookAjax.js"></script>