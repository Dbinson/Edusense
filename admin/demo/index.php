<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Demo');
    define('PAGE', 'demo');
    include('../mainInclude/header.php');
    include('../modals/addDemoModal.php');
    include('../../dbConnection.php');

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='../index.php'; </script>";
    //    }
    

    if(isset($_REQUEST['submitBtn'])){

        
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 55rem;margin:auto;">
            <div class="card-body">

            <h2>Demo</h2>
            <div class="row admin-mybooks-header">
                    <h2>Notes</h2>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary abutton" data-bs-toggle="modal" data-bs-target="#addDemoModalCenter">
                Add demo
                </button>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">class</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM demo
                                LEFT JOIN subject ON demo.subject_id = subject.subject_id
                            ";
                        $query = mysqli_query($conn, $sql);
                        $count=1;
                        while($result = mysqli_fetch_assoc($query)){
                            // print_r($result);
                            echo"<th scope='row'>".$count++."</th>";
                            echo "<td>".$result['demo_id']."</td>";
                            echo "<td>".$result['name']."</td>";
                            echo "<td>".$result['class']."</td>";
                            echo '
                                <td>
                                    <button name="deletebtn" class="btn btn-outline-danger deletebtn btn-sm" type="submit" id="'.$result['demo_id'].'"><i class="fas fa-trash-alt"></i></button>
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
<script src="../js/demoAjax.js"></script>
<?php include('../mainInclude/footer.php'); ?>