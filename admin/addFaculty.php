<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Faculty');
    define('PAGE', 'addStudent');
    include('./mainInclude/header.php');
    include('../dbConnection.php');

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='./index.php'; </script>";
    //    }
    

    if(isset($_REQUEST['submitBtn'])){

        // assigning user values to variable
        $defaultPass = strtolower(strtok($_REQUEST['faculty_name'], ' '))."@fac123";
        $faculty_name = $_REQUEST['faculty_name'];
        $faculty_email = $_REQUEST['faculty_email'];
        $faculty_mobile = $_REQUEST['faculty_mobile'];
        $faculty_join_date = $_REQUEST['faculty_join_date'];
        $city =  $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $country = $_REQUEST['country'];
        $pincode = $_REQUEST['pincode'];
        $user_id = '';
        $faculty_photo = $_FILES['faculty_photo']['name']; 
        $faculty_photo_temp = $_FILES['faculty_photo']['tmp_name'];
        $img_folder = '../images/fac/'. $faculty_photo;
        move_uploaded_file($faculty_photo_temp, $img_folder);

        // checking if the faculty already exist
        if(isset($faculty_email) and isset($faculty_mobile)){
            $sql = 'SELECT * FROM user WHERE user_email = "'.$faculty_email.'"';
            $query = $conn->query($sql);
            if($query){
                if(!$query->num_rows >= 1){
                    $sql2 = 'INSERT INTO user(user_name,user_email,user_mobile,role_id,user_password) VALUES(
                        "'.$faculty_name.'","'.$faculty_email.'","'.$faculty_mobile.'","102","'.$defaultPass.'"
                    )';
                    $query2 = $conn->query($sql2);
                    $user_id = $conn->insert_id;
                }else{
                    $result = $query->fetch_assoc();
                    $user_id = $result['user_id'];
                }
            }
        }

        
            
        $Qaddress = $conn->query("INSERT INTO address(city,state,country,pincode)
        VALUES ('".$city."','".$state."','".$country."','".$pincode."');");
        $address_id = $conn->insert_id;

        $Qfaculty = $conn->query("INSERT INTO faculty(faculty_address,faculty_join_date,user_id,faculty_photo)
        VALUES ('".$address_id."','".$faculty_join_date."','".$user_id."','".$img_folder."');");
        if($Qaddress && $Qfaculty){
            $msg = '<span class="bg-success p-3">Faculty Added</span> ';
        }else{
            $msg = '<span class="bg-dander p-3">Failed to Add faculty </span> ';
        }
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1 class="display-6 card-title text-center">Add Faculty</h1>
                    <div class="mb-3">  
                        <label for="faculty_name" class="form-label">Faculty Name</label><br>
                            <input type="text"  class="form-control" name="faculty_name" id="faculty_name">
                    </div>
                    
                    <div class="mb-3">
                        <label for="faculty_photo" class="form-label">Faculty Photo</label>
                            <input class="form-control" type="file" name="faculty_photo" id="faculty_photo">
                    </div>

                    <div class="mb-3">
                        <label for="faculty_mobile" class="form-label">Faculty Mobile</label>
                            <input class="form-control" type="tel" min="10" max="10" name="faculty_mobile" id="faculty_mobile">
                    </div>

                    <div class="mb-3">
                        <label for="faculty_email" class="form-label">Faculty Email</label>
                            <input class="form-control" type="email" name="faculty_email" id="faculty_email">
                    </div>

                    <div class="mb-3">
                        <label for="faculty_join_date" class="form-label">Faculty Join Date</label>
                            <input class="form-control" type="date" name="faculty_join_date" id="faculty_join_date">
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

                    <button class="btn btn-outline-primary" name="submitBtn" type="submit">Submit</button>
                </form>
                <?php if(isset($msg)){ echo $msg; } ?>
            </div>
        </div>
    </div>
       
</section>
</div>