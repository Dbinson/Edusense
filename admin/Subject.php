<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('PAGE', 'viewAssignment');
    include('./mainInclude/header.php');
    include('../dbConnection.php');
   

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='./index.php'; </script>";
    //    }
    

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
                $sql=mysqli_query($conn,"SELECT * FROM subject
                                        LEFT JOIN courses ON subject.course_id = courses.course_id
                                        LEFT JOIN class ON subject.class_id = class.class_id;");
                    $count=0;
                    while($result=mysqli_fetch_assoc($sql)){
                        // print_r($result);
                      $count++;
                        echo"<th scope='row'>".$count."</th>";
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
       
</section>
</div>