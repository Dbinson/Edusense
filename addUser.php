<?php 
if(!isset($_SESSION)){ 
  session_start(); 
}
include_once('dbConnection.php');

// setting header type to json, We'll be outputting a Json data
header('Content-type: application/json');
$arr = array();

// // Checking Email already Registered
// if(isset($_POST['stuemail']) && isset($_POST['checkemail'])){
//   $stuemail = $_POST['stuemail'];
//   $sql = "SELECT stu_email FROM student WHERE stu_email='".$stuemail."'";
//   $result = mysqli_query($conn, $sql);
//   $row = mysqli_fetch_row($result);
//   echo json_encode($row);
//   }

  // Inserting or Adding New Student
  if(isset($_POST['studsignup'])){
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = password_hash($_POST['stupass'],PASSWORD_DEFAULT);
    $arr = array();
    if($_POST['stuname'] == "" || $_POST['stuemail'] == "" || $_POST['stupass'] == ""){
      array_push($arr,'empty');
      // echo json_encode($arr);
    }else{
      if(filter_var($stuemail, FILTER_VALIDATE_EMAIL) ){
        $sql3 = "SELECT SUBSTRING(student_id, 5, 4) as Year FROM student
                WHERE SUBSTRING(student_id, 5, 4) = YEAR(CURDATE())
            ";
          $query3 = mysqli_query($conn, $sql3);
          $count = mysqli_num_rows($query3) + 1;

          $student_id = 'stud'.date('Y').$count .rand(1,500);

        $sql2 = "INSERT INTO student(student_id,stud_name,stud_email,password) VALUES ('".$student_id."','".$stuname."','".$stuemail."', '".$stupass."');";
        $query2 = mysqli_query($conn, $sql2);

        
        if($query2){
          array_push($arr,$student_id,'OK');

        }
      }else{
        array_push($arr,'invalidemail');
      }
    }
    
    echo json_encode($arr);
  }

  if(isset($_POST['addstuddetails']) && isset($_POST['id'])){

    $isUpdated = 0;

    //update student photo
    if(isset($_FILES['student_photo']) && !$_FILES['student_photo']['name'] == ""){

      $student_photo = $_FILES['student_photo']['name']; 
        $student_photo_temp = $_FILES['student_photo']['tmp_name'];
        $img_folder = '../../images/stud/'. $student_photo; 

        //image validate
        $allowed =  array('jpeg','jpg', "png", "gif", "bmp", "JPEG","JPG", "PNG", "GIF", "BMP");
        $ext = pathinfo($student_photo, PATHINFO_EXTENSION);
        if(!in_array($ext,$allowed) ) {
            $msg = '<span class="alert-danger p-3">INVALID Photo format</span> ';
            exit();
        }else{
            move_uploaded_file($student_photo_temp, $img_folder);

            $sql = "UPDATE student SET profile_pic = '".$img_folder."' WHERE student_id = '".$_POST['id']."'";
            $query = mysqli_query($conn,$sql);
            if($query){
                $isUpdated = 1;
            }
          }
      }

    //update student Mobile
    if(isset($_POST['student_mobile'])){
        $sql = "UPDATE student SET stud_mobile = '".$_POST['student_mobile']."' WHERE student_id = '".$_POST['id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student address
    if(isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['pincode'])){
       $address = $_POST['city'].','.$_POST['state'].','.$_POST['country'].' '.$_POST['pincode'];
      $sql = "UPDATE student SET address = '".$address."' WHERE student_id = '".$_POST['id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student parent Name
    if(isset($_POST['parent_name'])){
        $sql = "UPDATE student SET parent_name = '".$_POST['parent_name']."' WHERE student_id = '".$_POST['id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student parent Mobile
    if(isset($_POST['parent_mobile'])){
        $sql = "UPDATE student SET parent_mobile = '".$_POST['parent_mobile']."' WHERE student_id = '".$_POST['id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student parent email
    if(isset($_POST['parent_email'])){
        $sql = "UPDATE student SET parent_email = '".$_POST['parent_email']."' WHERE student_id = '".$_POST['id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    echo $isUpdated;

  }

  //Login Verification for student and faculty
  if(!isset($_SESSION['is_login'])){
    $islogged = 0;
    if(isset($_POST['checkLogemail']) && isset($_POST['userLogEmail']) && isset($_POST['userLogPass'])){
      $userLogEmail = $_POST['userLogEmail'];
      $userLogRole = $_POST['userLogRole'];
      $userLogPass = $_POST['userLogPass'];

      if($userLogRole == 103){
        $sql = "SELECT student_id,stud_email,stud_mobile,password FROM student 
            WHERE stud_email='".$userLogEmail."'";
        $query =mysqli_query($conn, $sql);
        if($query){
          if($row = mysqli_num_rows($query) > 0){
            while($result = mysqli_fetch_assoc($query)){
  
              //validate the password
              if(password_verify($userLogPass,$result["password"])){
                $_SESSION['email'] = $result['stud_email'];
                $_SESSION['is_login'] = true;
                $_SESSION['logRole'] = $userLogRole;
                $_SESSION['student_id'] = $result['student_id'];
                if($result['stud_mobile'] == null){
                  $_SESSION['$aDetails'] = 0;
                }else{
                  $_SESSION['$aDetails'] = 1;
                }
                $islogged = 1;
              }
            }//end of while
          }//end of row count
        }//end of if query check
      }elseif($userLogRole == 102){
        $sql = "SELECT faculty_id,faculty_email,password FROM faculty 
            WHERE faculty_email='".$userLogEmail."'";
        $query =mysqli_query($conn, $sql);
        if($query){
          if($row = mysqli_num_rows($query) > 0){
            while($result = mysqli_fetch_assoc($query)){
  
              //validate the password
              if(password_verify($userLogPass,$result["password"])){
                $_SESSION['email'] = $result['faculty_email'];
                $_SESSION['is_login'] = true;
                $_SESSION['logRole'] = $userLogRole;
                $_SESSION['faculty_id'] = $result['faculty_id'];
                $islogged = 1;
              }
            }//end of while
          }//end of row count
        }//end of if query check
      }
      echo $islogged;
    }
  }
