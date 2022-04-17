<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Subject');
    define('PAGE', 'subject');
    include('../mainInclude/header.php');
    
    include('../modals/addSubjectmodal.php');
    include('../modals/updateSubjectModal.php');
   

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='../index.php'; </script>";
    // }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 55rem;margin:auto;">
            <div class="card-body">
            


            <div class="row admin-mybooks-header">
        
        <h2>Subject</h2>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary abutton" data-bs-toggle="modal" data-bs-target="#addsubjectModalCenter">
        Add Subject
        </button>
                    
<!-- End   ADD SUBJECT -->

<!-- UPDATE  SUBJECT -->
<table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Class Name</th>
                </tr>
                </thead>
                <tbody>
            <?php
            include_once('../../dbConnection.php');
                $sql = "SELECT * FROM subject";
                    $query = mysqli_query($conn, $sql);
                    $count=1;
                    while($result = mysqli_fetch_assoc($query)){
                        // print_r($result);
                        echo"<tr><th scope='row'>".$count++."</th>";
                        echo "<td>".$result['subject_id']."</td>";
                        echo "<td>".$result['name']."</td>";
                        echo "<td>".$result['class']."</td>";
                        // echo '
                        //     <td>
                        //         <button type="button" class="btn btn-primary editsubjectbtn" id="'.$result['subject_id'].'"><span class="material-icons">
                        //         update
                        //         </span>
                        //         </button>   
                        //     </td>';
                         echo'   
                            <td>
                                <button class="btn btn-danger btn-sm deletebtn" type="button" id="'.$result['subject_id'].'"><span class="material-icons">
                                delete
                                </span></button>
                            </td>
                            <td>
                               <input type="hidden" id="sub" value="'.$result['subject_id'].'">
                          </td>
                        </tr>
                        
                        ';
                    }
                    ?>
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