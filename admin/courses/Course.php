<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Course');
    define('PAGE', 'courses');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');
    include('../modals/addCoursemodal.php');

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }
    

    if(isset($_REQUEST['submitBtn'])){

        $course_name =  $_POST['course_name']; 
        $board_name =  $_POST['board_name']; 
        $course_desc =  $_POST['course_desc'];
        $course_image =  $_POST['course_image'];
        
     $Q3 = mysqli_query($conn, "Select * from board where board_name='".$board_name."';");
     if(mysqli_num_rows($Q3)==0){
       
    $Q2 = mysqli_query($conn,"INSERT INTO board(board_name)
    VALUES ('".$board_name."');"); 
    $board_id = mysqli_insert_id($conn); 
     }

    else{
        while($result=mysqli_fetch_assoc($Q3)) {
            $board_id=$result["board_id"];
    }
    }

    // $Q2 = mysqli_query($conn,"INSERT INTO board(board_name)
    // VALUES ('".$board_name."');");
    
    echo $board_id;
    echo $board_name;
    echo $course_name;
    echo $course_desc;
    $Q1 = mysqli_query($conn,"INSERT INTO courses(course_name,course_desc,course_image,board_id)
    VALUES ('".$course_name."','".$course_desc."','".$course_image."','".$board_id."');");
    }

    
?>
<!-- <section id="content">
    <div class="container p-4">
        -->
        <!-- <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body"> -->
           
            <section class="column admin">
                <div class="column admin-card shadow-sm p-3 mb-5 bg-body rounded">
                <div class="row admin-mybooks-header">
                    <h2>Courses</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcourseModalCenter">
                    Add course
                    </button>
                </div>
                
                <table class="table table-hover table-striped table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Board Name</th>
                            <th scope="col">Course Description</th>
                            <th scope="col">Update</th>
                            <th scope="col">Remove</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>

                    <?php
                        $sql = "SELECT courses.course_id,board.board_name,courses.course_name,courses.course_desc FROM assign_course
                                    LEFT JOIN board ON assign_course.board_id = board.board_id
                                    LEFT JOIN courses ON assign_course.course_id = courses.course_id
                                    GROUP BY(assign_course.board_id) 
                                    ";
                                $query = $conn->query($sql);
                            $count=0;
                            while($result = $query->fetch_assoc()){
                                // print_r($result);
                            $count++;
                                echo"<th scope='row'>".$count."</th>";
                                echo "<td>".$result['course_name']."</td>";
                                echo "<td>".$result['board_name']."</td>";
                                echo "<td>".$result['course_desc']."</td>";
                                echo '
                                    <td>
                                    <button class="btn btn-outline-success btn-sm" type="submit"><i class="fas fa-pen"></i></button>
                                    </button> 
                                    </td>
                                    
                                    <td>
                                    <button name="deletebtn" class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                
                                    <input type="hidden" id="id" value="'.$result['course_id'].'">
                                </tr>
                                
                                ';
                            }
                            ?></tbody>
                
    
                            </td>
                        
                        <td>
                            <input type="hidden" id="id">
                        </td>
                    
                    </tbody>
                </table>
                </div>
            </section>
        <!-- </div>
    </div> -->
<!--        
</section>
</div> -->

<?php include('../mainInclude/footer.php'); ?>