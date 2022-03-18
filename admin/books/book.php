<?php

if (!isset($_SESSION)) {
    session_start();
}
define('PAGE', 'viewAssignment');
include('./mainInclude/header.php');
include('../dbConnection.php');

// if(!isset($_SESSION['is_admin_login'])){
//     echo "<script> location.href='./index.php'; </script>";
//    }


if (isset($_REQUEST['submitBtn'])) {
}


?>
<section id="content">
    <div class="container p-4">

        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Chapter.No</th>
                            <th scope="col">Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            $sql = mysqli_query($conn, "SELECT * FROM books
                                            --  INNER JOIN chapter ON books.subject_id = chapter.chapter_id
                                            INNER JOIN  subject ON books.subject_id=subject.subject_id
                                            INNER JOIN  class ON books.class_id=class.class_id;");

                            $book_data = array();

                            $count = 0;
                            while ($result = mysqli_fetch_assoc($sql)) {
                                $book_data[] = $result;
                                // print_r($result);
                                $count++;
                                echo "<th scope='row'>" . $count . "</th>";
                                echo "<td>" . $result['subject_name'] . "</td>";
                                $s = mysqli_query($conn, "SELECT COUNT(book_id),book_id FROM chapter GROUP BY book_id;");

                                while ($re = mysqli_fetch_assoc($s)) {

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