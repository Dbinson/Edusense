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

        // accept request

        header("Location: index.php");


        $request_id = $_GET['Request_id'];
                $r=$_GET['r'];
        if ($r==1){
                $Qrequest = mysqli_query($conn,"UPDATE `student_book_request` SET `request_status` = 'accepted' WHERE `student_book_request`.`student_book_req_id` ='".$request_id."';");
        
        }if($r==2){
                $Qrequest = mysqli_query($conn,"UPDATE `faculty_book_request` SET `request_status` = 'accepted' WHERE `faculty_book_request`.`faculty_book_req_id` ='".$request_id."';");
        }
       
            

          if($Qrequest){
                        exit();
          }


        //   remove request

        if( $request_type=="request"){
          
            if($role==2){ 
               $Qrequest = mysqli_query($conn,"UPDATE faculty_book_request SET request_status='removed' 
                where faculty_book_req_id='".$request_id."';");
           

            }elseif($role==1){
              $Qrequest = mysqli_query($conn,"UPDATE student_book_request SET request_status='removed' 
              where student_book_req_id='".$request_id."';");

        }
      
             

       }
        
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
                        <th scope="col">Type</th>
                        <th scope="col">Stream</th>
                        <th scope="col">Class</th>
                        <th scope="col">Chapter</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                //Check for student requests
                        $sql=mysqli_query($conn,"SELECT student_book_request.student_book_req_id,student_book_request.request_status, chapter.book_id, books.subject_id, books.class_id,subject.subject_name,class.class_name, students.student_name,chapter.chapter_name
                            FROM student_book_request
                            LEFT JOIN students ON student_book_request.student_id = students.student_id
                            LEFT JOIN chapter ON student_book_request.chapter_id = chapter.chapter_id
                            LEFT JOIN books ON chapter.book_id = books.book_id
                            LEFT JOIN subject on books.subject_id = subject.subject_id
                            LEFT JOIN class on books.class_id = class.class_id");
                        $count=1;
                        while($result=mysqli_fetch_assoc($sql)){
                            if($result['request_status'] == 'pending'){
                                echo '
                                    <tr>
                                        <th scope="row">'.$count++.'</th>
                                        <td>'.$result['student_name'].'</td>
                                        <td>Student</td>
                                        <td>'.$result['subject_name'].'</td>
                                        <td>'.$result['class_name'].'</td>
                                        <td>'.$result['chapter_name'].'</td>
                                        <td>
                                        
                                        
                                            <a href="AcceptRequest.php?Request_id='.$result['student_book_req_id'].'&r=1"  class="btn btn-primary btn-sm"  >Accept Request</a>
                                           
                                            </td>
                                        <td>
                                    
                                        <a href="removeRequest.php?Request_id='.$result['student_book_req_id'].'&r=1 &request_type=request"  class="btn btn-danger btn-sm">Remove Access</a>
                                     
                                        </td>
                                    </tr>
                                ';
                            }
                        }

                        //Check for faculty requests
                        $sql2=mysqli_query($conn,"SELECT faculty_book_req_id, request_status, chapter.book_id, books.subject_id, books.class_id,subject.subject_name,class.class_name, faculty.faculty_name,chapter.chapter_name
                            FROM faculty_book_request
                            LEFT JOIN faculty ON faculty_book_request.faculty_id = faculty.faculty_id
                            LEFT JOIN chapter ON faculty_book_request.chapter_id = chapter.chapter_id
                            LEFT JOIN books ON chapter.book_id = books.book_id
                            LEFT JOIN subject on books.subject_id = subject.subject_id
                            LEFT JOIN class on books.class_id = class.class_id");

                        while($result2=mysqli_fetch_assoc($sql2)){
                            if($result2['request_status'] == 'pending'){
                                echo '
                                    <tr>
                                        <th scope="row">'.$count++.'</th>
                                        <td>'.$result2['faculty_name'].'</td>
                                        <td>Faculty</td>
                                        <td>'.$result2['subject_name'].'</td>
                                        <td>'.$result2['class_name'].'</td>
                                        <td>'.$result2['chapter_name'].'</td>
                                        <td>
                                            <a href="AcceptRequest.php?Request_id='.$result2['faculty_book_req_id'].'&r=2" class="btn btn-primary btn-sm" >Accept Request</a>
                                        </td>
                                        <td>
                                        <a href="RemoveRequest.php?Request_id='.$result2['faculty_book_req_id'].'&r=2 &request_type=request" class="btn btn-danger btn-sm">Remove Access</a>
                                        </td>
                                    </tr>
                                ';
                            }
                        }
                        ?>
                        
                   
                
                </tbody>
            </table>


            </div>
        </div>
    </div>
       
</section>
</div>