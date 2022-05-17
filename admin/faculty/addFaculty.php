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
    

    if(isset($_REQUEST['submitBtn'])){

        // assigning user values to variable
        $defaultPass = strtolower(strtok($_REQUEST['faculty_name'], ' '))."@fac123";
        $pass = password_hash($defaultPass,PASSWORD_DEFAULT);
        $faculty_name = $_REQUEST['faculty_name'];
        $faculty_email = $_REQUEST['faculty_email'];
        $faculty_mobile = $_REQUEST['faculty_mobile'];
        $faculty_join_date = $_REQUEST['faculty_join_date'];
        $address =  $_REQUEST['address'];
        $faculty_photo = $_FILES['faculty_photo']['name']; 
        $faculty_photo_temp = $_FILES['faculty_photo']['tmp_name'];
        $img_folder = '../../images/fac/'. $faculty_photo;

        //image validate
        $allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
        $ext = pathinfo($faculty_photo, PATHINFO_EXTENSION);
        if(!in_array($ext,$allowed) ) {
            $msg = '<span class="alert-danger p-3">INVALID Photo format</span> ';
        }else{
        move_uploaded_file($faculty_photo_temp, $img_folder);

        $sql3 = "SELECT SUBSTRING(faculty_id, 4, 4) as Year FROM faculty
            WHERE SUBSTRING(faculty_id, 4, 4) = YEAR(CURDATE())
             ";
        $query3 = mysqli_query($conn, $sql3);
        $count = mysqli_num_rows($query3) + 1;

        $faculty_id = 'fac'.date('Y').$count.rand(1,500);

        // checking if the faculty already exist
        if(isset($faculty_email) && isset($faculty_mobile)){
            $sql = 'SELECT * FROM faculty WHERE faculty_email = "'.$faculty_email.'"';
            $query = mysqli_query($conn,$sql);
            if($query){
                if(!mysqli_num_rows($query) >= 1){
                    // if faculty dosn't exist
                    $sql2 = 'INSERT INTO faculty(faculty_id,profile_pic,faculty_name,faculty_email,faculty_mobile,password,address,join_date) VALUES(
                        "'.$faculty_id.'","'.$faculty_photo.'","'.$faculty_name.'","'.$faculty_email.'","'.$faculty_mobile.'","'.$pass.'","'.$address.'","'.$faculty_join_date.'"
                    )';
                    $query2 = mysqli_query($conn, $sql2);
                    if($query2){
                        $msg = '<span class="alert-success p-3">Added Successfully</span> ';
                    }
                }else{
                    // if faculty already exist
                    $msg = '<span class="alert-dander p-3">Already exists </span> ';
                }
            }
        }
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
                            <input type="text"  class="form-control" name="faculty_name"  pattern="[a-zA-Z ]*$" required id="faculty_name"  oninvalid="alert('Incorrect Name.')">
                    </div>
                    
                    <div class="mb-3">
                        <label for="faculty_photo" class="form-label">Faculty Photo</label>
                            <input class="form-control" type="file" name="faculty_photo"  id="faculty_photo">
                    </div>

                    <div class="mb-3">
                        <label for="faculty_mobile" class="form-label">Faculty Mobile</label>
                            <input class="form-control" type="tel" min="10" max="10" name="faculty_mobile"  pattern="[7-9]{1}[0-9]{9}" required id="faculty_mobile" oninvalid="alert('Incorrect Phone number')">
                    </div>

                    <div class="mb-3">
                        <label for="faculty_email" class="form-label">Faculty Email</label>
                            <input class="form-control" type="email" required name="faculty_email"  pattern="[^ @]*@[^ @]*" oninvalid="alert('Invalid Email')" required id="faculty_email" >
                    </div>

                    <div class="mb-3">
                        <label for="faculty_join_date" class="form-label">Faculty Join Date</label>
                            <input class="form-control" type="date" required name="faculty_join_date" required max="<?php echo date("Y-m-d"); ?>" oninvalid="alert('join Date invalid')" id="faculty_join_date">
                    </div>
                
                    <div class="mb-3">  
                            <label for="address" class="form-label">address</label><br>
                            <input type="text"  class="form-control" name="address" id="address">
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