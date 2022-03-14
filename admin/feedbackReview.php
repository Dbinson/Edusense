
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

    // remove feedback
    $feedback_id =  $_GET['feedback_id'];
$sql = "DELETE FROM feedback WHERE feedback_id =".$feedback_id.";";
         if (mysqli_query($conn, $sql)) {
                      exit();
                    } else {
                      echo "Error: ";
                    }
        

}


?>
<section id="content">
<div class="container p-4">
   
    <div class="card" style="width: 35rem;margin:auto;">
        <div class="card-body">

<div class="column admin-card">
            <div class="row admin-mybooks-header">
                <h2>Students Review</h2>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Feedback ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Impression</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                        $sql = mysqli_query($conn, "SELECT feedback_id,students.student_name,subject.subject_name,feedback_desc, feedback_type,feedback_rating FROM feedback
                            LEFT JOIN students ON feedback.student_id = students.student_id
                            LEFT JOIN subject ON feedback.subject_id = subject.subject_id;"
                            );
                            $count = 1;
                        while($result= mysqli_fetch_assoc($sql)){
                            echo '
                            <tr>
                                <th scope="row">'.$count++.'</th>
                                <td>'.$result['feedback_id'].'</td>
                                <td>'.$result['student_name'].'</td>
                                <td>'.$result['subject_name'].'</td>
                                <td>'.$result['feedback_type'].'</td>
                                <td>'.$result['feedback_rating'].'</td>';

                                switch($result['feedback_rating']){
                                    case '1':
                                        echo '<td>Weak</td>';
                                        break;
                                    case '2':
                                        echo '<td>Good</td>';
                                        break;
                                    case '3':
                                        echo '<td>Very Good</td>';
                                        break;
                                    case '4':
                                        echo '<td>Execellent</td>';
                                        break;
                                    case '5':
                                        echo '<td>Outstanding</td>';
                                        break;
                                }


                                echo '
                                
                                <td>'.$result['feedback_desc'].'</td>
                                <td>

                                 
                                     
                                <a href ="removefeedback.php?feedback_id='.$result['feedback_id'].'" class="btn btn-danger btn-sm" type="submit">Delete Review
                                    
                            </a>
                               </td>
                            </tr>
                                
                            
                            
                            ';
                        }


                ?>
                   
                      


                </tbody>
            </table>
        </div>



    </section>

    <script>
    function deleteReview(feedbackId){
         $.ajax({
            url:"removeFeedback.php",
            type:"POST",
            data:{
                feedback_id:feedbackId
            },
            dataType: "text",
            success:function(result){        
            },
            error: function(){
                alert("Error");
			}
        });
    }
</script>

</div>
        </div>
    </div>
       
</section>
</div>