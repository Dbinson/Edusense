<?php 
if(!isset($_SESSION)){ 
  session_start(); 
}
include_once('dbConnection.php');

// setting header type to json, We'll be outputting a Json data
header('Content-type: application/json');

// // Checking Email already Registered
// if(isset($_POST['stuemail']) && isset($_POST['checkemail'])){
//   $stuemail = $_POST['stuemail'];
//   $sql = "SELECT stu_email FROM student WHERE stu_email='".$stuemail."'";
//   $result = mysqli_query($conn, $sql);
//   $row = mysqli_fetch_row($result);
//   echo json_encode($row);
//   }

//   // Inserting or Adding New Student
//   if(isset($_POST['studsignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])){
//     $stuname = $_POST['stuname'];
//     $stuemail = $_POST['stuemail'];
//     $stupass = password_hash($_POST['stupass'],PASSWORD_DEFAULT);

//     $sql2 = "INSERT INTO student(stud_name,stud_email,password) VALUES ('".$stuname."','".$stuemail."', '".$stupass."');";
//     $result2 = mysqli_query($conn, $sql2);

//     if($result2){
//       echo json_encode("OK");
//     } else {
//       echo json_encode("Failed");
//     }
//   }

  //Login Verification for student and faculty
  if(!isset($_SESSION['is_login'])){
    $islogged = false;
    if(isset($_POST['checkLogemail']) && isset($_POST['userLogEmail']) && isset($_POST['userLogPass'])){
      $userLogEmail = $_POST['userLogEmail'];
      $userLogRole = $_POST['userLogRole'];
      $userLogPass = $_POST['userLogPass'];

      if($userLogRole == 103){
        $sql = "SELECT student_id,stud_email,password FROM student 
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
                $islogged = true;
              }
            }//end of while
          }//end of row count
        }//end of if query check
      }elseif($userLogRole == 102){
        $sql = "SELECT faculty_id,faculty_email,password FROM student 
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
                $islogged = true;
              }
            }//end of while
          }//end of row count
        }//end of if query check
      }
      echo $islogged;
    }
  }
     
 

?>