<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE', 'Student');
    define('PAGE', 'users');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }
    

    if(isset($_REQUEST['submitBtn'])){

        // assigning user values to variable
        $defaultPass = strtolower(strtok($_REQUEST['student_name'], ' '))."123";
        $student_name = $_REQUEST['student_name'];
        $student_email = $_REQUEST['student_email'];
        $student_mobile = $_REQUEST['student_mobile'];
        $city =  $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $country = $_REQUEST['country'];
        $pincode = $_REQUEST['pincode'];
        $parent_name =  $_REQUEST['parent_name'];
        $parent_mobile = $_REQUEST['parent_mobile'];
        $parent_email =  $_REQUEST['parent_email'];  
        $student_photo = $_FILES['student_photo']['name']; 
        $student_photo_temp = $_FILES['student_photo']['tmp_name'];
        $img_folder = '../../images/stud/'. $student_photo; 
        move_uploaded_file($student_photo_temp, $img_folder);

        $address = $city.','.$state.','.$country.' '.$pincode; 
        // checking if the student already exist
        if(isset($student_email) and isset($student_mobile)){
            
            $stupass = password_hash($defaultPass,PASSWORD_DEFAULT);
        
            $sql3 = "SELECT SUBSTRING(student_id, 5, 4) as Year FROM student
                        WHERE SUBSTRING(student_id, 5, 4) = YEAR(CURDATE())
                    ";
                $query3 = mysqli_query($conn, $sql3);
                $count = mysqli_num_rows($query3) + 1;
        
                $student_id = 'stud'.date('Y').$count;
        
            $sql2 = "INSERT INTO student(student_id,profile_pic,stud_name,stud_email,password,address,stud_mobile,parent_name,parent_email,parent_mobile) 
                VALUES ('".$student_id."','".$img_folder."','".$student_name."','".$student_email."', '".$stupass."','".$address."','".$student_mobile."','".$parent_name."','".$parent_email."','".$parent_mobile."')";
            $result2 = mysqli_query($conn, $sql2);
        
            $arr = array();
            if($result2){
                $msg = '<span class="alert-success p-3">Added!!!</span> ';
        
            }else{
                $msg = '<span class="alert-danger p-3">Failed!!! </span> ';
            }
        }

        // if($result2){
        //     $msg = '<span class="alert-success p-3">Student Added</span> ';
        // }else{
        //     $msg = '<span class="bg-dander p-3">Failed to Add Student </span> ';
        // }


    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1 class="display-6 card-title text-center">Add Student</h1>
                    <div class="mb-3">  
                        <label for="student_name" class="form-label">Student Name</label><br>
                            <input type="text"  class="form-control" name="student_name" id="student_name">
                    </div>
                    
                    <div class="mb-3">
                        <label for="student_photo" class="form-label">Student Photo</label>
                            <input class="form-control" type="file" name="student_photo" id="student_photo">
                    </div>

                    <div class="mb-3">
                        <label for="student_mobile" class="form-label">Student Mobile</label>
                            <input class="form-control" type="tel" min="10" max="10" name="student_mobile" id="student_mobile">
                    </div>

                    <div class="mb-3">
                        <label for="student_email" class="form-label">Student Email</label>
                            <input class="form-control" type="email" name="student_email" id="student_email">
                    </div>
                
                    <!-- Address details -->
                    <h5 class="card-subtitle ">Address Details</h5>
                    <hr>
                    <div class="mb-3">  
                            <label for="city" class="form-label">City</label><br>
                            <input type="text"  class="form-control" name="city" id="city">
                    </div>  
                    <div class="mb-3">
                            <label for="state" class="form-label">State</label><br>
                            <input type="text"  class="form-control" name="state" id="state">
                    </div>
                    <div class="mb-3">
                            <label for="country" class="form-label">Country</label><br>
                            <input type="text"  class="form-control" name="country" id="country">
                    </div>
                    <div class="mb-3">
                            <label for="pincode" class="form-label">Pincode</label><br>
                            <input type="text"  class="form-control" name="pincode" id="pincode">
                    </div> 

                    <!-- Parent details -->
                    
                    <h5 class="card-subtitle ">Parent Details</h5>
                    <hr>
                    <div class="mb-3">
                            <label for="parent_name" class="form-label">Parent Name</label><br>
                            <input type="text"  class="form-control" name="parent_name" id="parent_name">
                    </div>
                    <div class="mb-3">
                            <label for="parent_mobile" class="form-label">Parent Mobile Number</label><br>
                            <input type="text"  class="form-control" name="parent_mobile"v id="parent_mobile">
                    </div>
                    <div class="mb-3">
                            <label for="parent_email" class="form-label">Parent Email</label><br>
                            <input type="email"  class="form-control" name="parent_email" id="parent_email">
                    </div>
                    <button class="btn btn-outline-primary" name="submitBtn" type="submit">Submit</button>
                </form>
                <?php if(isset($msg)){ echo $msg; } ?>
            </div>
        </div>
    </div>
       
</section>
</div>
<?php include('../mainInclude/footer.php'); ?>