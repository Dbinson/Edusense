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
                    <th>Update</th>
                    <th>Remove</th>
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = " SELECT * FROM faculty
                        ";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['faculty_id'].'</td>
                            <td>'.$row['faculty_name'].'</td>
                            <td>'.$row['faculty_email'].'</td>
                            <td>'.$row['faculty_mobile'].'</td>
                            <td>'.$row['join_date'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>
                                <button name="updatebtn" class="btn btn-outline-success updatebtn btn-sm" type="submit" id="'.$row['faculty_id'].'"><span class="material-symbols-outlined">update</span>
                            </td>
                            <td>
                                <button name="deletebtn" class="btn btn-outline-danger deletebtn btn-sm" type="submit" id="'.$row['faculty_id'].'"><span class="material-symbols-outlined">delete</span>
                                </button>
                            </td>

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