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

        
    }
// faculty pending
    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">


            <h1 class="display-6 text-center">Demo</h1>
        <?php
     $sql=mysqli_query($conn,"SELECT * FROM demo 
            LEFT JOIN demo_registration ON demo.demo_reg_id = demo_registration.demo_reg_id
            LEFT JOIN subject ON demo_registration.subject_id = subject.subject_id
            WHERE demo_registration.user_id='".$_SESSION['user_id']."';");
     $count=0;
     while($result=mysqli_fetch_assoc($sql)){

      echo'
                    <div class="card  w-80 shadow p-1 m-5 bg-body rounded ">
                        <div class="card-body d-flex flex-row justify-content-between px-5">
                            <div>
                                <h5 class="card-title mb-3">'.$result['subject_name'].'</h5>
                                ';
                                if($result['demo_status'] == 'accepted'){
                                    echo '<a href="#viewDemoSched"  class="btn btn-outline-primary viewSch" id="'.$result['demo_id'].'">Demo Schedule</a>';
                                }elseif($result['sched_status'] == '50'){
                                    echo '<a href="#" class="btn btn-outline-primary">Register For subject</a>';
                                }elseif($result['demo_status'] == 'denined'){
                                    echo '<button class="btn btn-outline-danger" disabled>Rejected</button>';
                                }else{
                                    echo '';
                                }
                            
                        echo '</div>
                        <div class="">
                            <h4>Status</h4>';
                            if($result['demo_status'] == 'accepted'){
                                echo '<span class="">Accepted</span>';
                            }elseif($result['sched_status'] == '50'){
                                echo '<span class="">Completed</span>';
                            }elseif($result['sched_status'] == '30'){
                                echo '<span class="">Pending</span>';
                            }else{
                                echo '<span class="">Overdue</span>';
                            }
                        echo '
                        </div>
                        </div>
                    </div>
                    ';}
            ?>

            </div>
        </div>
    </div>
       
</section>
</div>
