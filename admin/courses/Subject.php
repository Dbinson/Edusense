<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Courses');
    define('PAGE', 'courses');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');
    include('../modals/addSubjectmodal.php');
   

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
    }
    

    if(isset($_REQUEST['submitBtn'])){

        $subject_name =  $_POST['subject_name'];
        $course_name =  json_decode($_POST['course_name']); 
        $class_name =  json_decode($_POST['class_name']);
         
    $Q1 = mysqli_query($conn,"INSERT INTO subject(subject_name,course_id,class_id)
    VALUES ('".$subject_name."','".$course_name."','".$class_name."');");
    
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">
            


            <div class="column admin-card">
        
        <h2>Subject</h2>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsubjectModalCenter">
        Add Subject
        </button>
                    
<!-- End   ADD SUBJECT -->

<!-- UPDATE  SUBJECT -->
<table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Class</th>
                  
                </tr>
                </thead>
                <tbody>
            <?php
                $sql = "SELECT * FROM subject
                        LEFT JOIN assign_course ON subject.assign_course_id = assign_course.assign_course_id
                        LEFT JOIN courses ON assign_course.course_id = courses.course_id
                        LEFT JOIN class ON assign_course.class_id = class.class_id;";
                    $query = $conn->query($sql);
                    $count=1;
                    while($result = $query->fetch_assoc()){
                        // print_r($result);
                        echo"<th scope='row'>".$count++."</th>";
                        echo "<td>".$result['subject_name']."</td>";
                        echo "<td>".$result['course_name']."</td>";
                        echo "<td>".$result['class_name']."</td>";
                        echo '
                            <td>
                            <button type="button" class="btn btn-primary editsubjectbtn">Update
                            </button>   
                            </td>
                            
                            <td>
                                <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                            </td>
                            <td>
                               <input type="hidden" id="sub" value="'.$result['subject_id'].'">
                          </td>
                        </tr>
                        
                        ';
                    }
                    ?>
                   

                    </td>
                    <!-- <td>
                        <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                    </td> -->
                </tr>
            
            </tbody>
        </table>
    </div>
 <!-- End UPDATE SUBJECT -->             
            </tbody>
        </table>



            </div>
        </div>
                    
    </div>
    </div>
       
</section>
</div>

<?php include('../mainInclude/footer.php'); ?>