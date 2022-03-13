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

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">

            <h2>Demo Requests</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Accept</th>
                        <th scope="col">Decline</th>
                    </tr>
                </thead>           
                <tbody>
               
                    <?php

                    //Check for student requests
                        $sql=mysqli_query($conn,"SELECT * FROM demo_registration
                            LEFT JOIN user ON demo_registration.user_id = user.user_id
                            WHERE demo_status = 'pending'
                            ;");
                        $count=1;
                        while($result=mysqli_fetch_assoc($sql)){
                                echo '
                                    <tr>
                                        <th scope="row">'.$count++.'</th>
                                        <td>'.$result['name'].'</td>
                                        <td>'.$result['user_email'].'</td>
                                        <td>'.$result['user_mobile'].'</td>
                                        <td>';
                                        ?>
                                        
                                            <button class="btn btn-outline-primary btn-sm acbtn" id="<?php echo $result['demo_reg_id']; ?>" type="submit"><i class="fas fa-check"></i></button>
                                            <?php 
                                        echo '</td>
                                        <td>';
                                        ?>
                                            <button class="btn btn-outline-danger btn-sm"  type="submit"><i class="fas fa-trash-alt"></i></button>
                                            <?php echo '
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