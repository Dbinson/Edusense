<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Faculty');
    define('PAGE', 'users');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='./index.php'; </script>";
    //    }

?>
<section id="content">
    <div class="container p-4">
       <table class="table table-striped table-bordered table-hover ">
           <thead>
               <tr>
                   <th>#</th>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Mobile</th>
                    <th>Join Date</th>
                   <th>Address</th>
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = "SELECT faculty.faculty_id,faculty.faculty_join_date,user.user_name,user.user_email,
                                user.user_mobile,address.city,address.state,address.country,address.pincode
                                FROM faculty
                                LEFT JOIN user ON faculty.user_id = user.user_id
                                LEFT JOIN address ON faculty.faculty_address = address.address_id
                        ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['faculty_id'].'</td>
                            <td>'.$row['user_name'].'</td>
                            <td>'.$row['user_email'].'</td>
                            <td>'.$row['user_mobile'].'</td>
                            <td>'.$row['faculty_join_date'].'</td>
                            <td>'.$row['city'].','.$row['state'].','.$row['country'].' - '.$row['pincode'].'</td>
                        </tr>
                        ';
                    }               

                ?>
           </tbody>
       </table>
        
    </div>
       
</section>
</div>

<?php include('../mainInclude/footer.php'); ?>