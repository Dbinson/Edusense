<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Demo');
    define('PAGE', 'demo');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }
    

    if(isset($_REQUEST['submitBtn'])){

        
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">

            <h2>Demo Completed</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Demo Start Date</th>
                        <th scope="col">Demo End Date</th>
                        <th scope="col">faculty name</th>
                        <th scope="col">subject name</th>
                        <th scope="col">class name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM demo
                                LEFT JOIN demo_registration ON demo.demo_reg_id = demo_registration.demo_reg_id
                                LEFT JOIN schedule ON demo.sched_id = schedule.sched_id
                                LEFT JOIN faculty ON demo.faculty_id = faculty.faculty_id
                                LEFT JOIN subject ON demo_registration.subject_id = subject.subject_id
                                LEFT JOIN assign_course ON subject.assign_course_id = assign_course.assign_course_id
                                LEFT JOIN class ON assign_course.class_id = class.class_id
                                WHERE sched_status = '50'
                            ;";
                        $query = $conn->query($sql);
                        $count=0;
                        while($result = $query->fetch_assoc()){
                            // print_r($result);
                          $count++;
                            echo"<th scope='row'>".$count."</th>";
                            echo "<td>".$result['name']."</td>";
                            echo "<td>".$result['start_date_time']."</td>";
                            echo "<td>".$result['end_date_time']."</td>";
                            echo "<td>".$result['faculty_name']."</td>";
                            echo "<td>".$result['subject_name']."</td>";
                            echo "<td>".$result['class_name']."</td>";

                            echo '
                                <td>
                                    <button name="deletebtn" class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
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
<?php include('../mainInclude/footer.php'); ?>