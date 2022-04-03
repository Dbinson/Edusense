<?php 
if(!isset($_SESSION)){ 
  session_start(); 
}
include_once('dbConnection.php');

// setting header type to json, We'll be outputting a Json data
header('Content-type: application/json');

// Checking Email already Registered
if(isset($_POST['stuemail']) && isset($_POST['checkemail'])){
  $stuemail = $_POST['stuemail'];
  $sql = "SELECT stu_email FROM student WHERE stu_email='".$stuemail."'";
  $result = $conn->query($sql);
  $row = $result->num_rows;
  echo json_encode($row);
  }

  // Inserting or Adding New Student
  if(isset($_POST['studsignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass']) && isset($_POST['role'])){
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];
    $role = $_POST['role'];

    $sql = "INSERT INTO user(user_name,user_email, user_password,role_id) VALUES ('".$stuname."','".$stuemail."', '".$stupass."','".$role."');";
    $q1 = $conn->query($sql);
    // $userId = $conn->insert_id;
    // $sql2 = "INSERT INTO students(student_name,user_id) VALUES ('".$stuname."','".$userId."');";
    // $q2 = $conn->query($sql2);

    if($q1){
      echo json_encode("OK");
    } else {
      echo json_encode("Failed");
    }
  }

  // User Login Verification
  if(!isset($_SESSION['is_login'])){
    if(isset($_POST['checkLogemail']) && isset($_POST['userLogEmail']) && isset($_POST['userLogPass'])){
      $userLogEmail = $_POST['userLogEmail'];
      $userLogRole = $_POST['userLogRole'];
      $userLogPass = $_POST['userLogPass'];
      
      $sql = "SELECT user_id,user_email,user_password,role_id FROM user WHERE user_email='".$userLogEmail."' AND user_password='".$userLogPass."' AND role_id='".$userLogRole."'";
      $query = $conn->query($sql);
      $row = $query->num_rows;
      
      if($row === 1){
        $rs=$query->fetch_assoc();
        $_SESSION['userId'] = $rs['user_id'];
        $_SESSION['logRole'] = $userLogRole;
        $_SESSION['userLogEmail'] = $userLogEmail;
        if($userLogRole = '103'){
          $_SESSION['is_stud_login'] = true;
          //getting student id
          $sql3 = 'SELECT student_id FROM students WHERE user_id = "'.$rs['user_id'].'"';
          $query3 = $conn->query($sql3);
          $result3 = $query3->fetch_assoc();

          //assigning student_id to variable 
          $stud_id = $result3['student_id']; 

          //assigning student_id to variable 
          $_SESSION['student_id'] = $stud_id;

        }else{
          $_SESSION['is_fac_login'] = true;

           //getting faculty id
           $sql4 = 'SELECT faculty_id FROM faculty WHERE user_id ='.$re['user_id'];
           $query4 = $conn->query($sql4);
           $result4 = $query4->fetch_assoc();

           //assigning faculty_id to variable 
          $fac_id = $result4['faculty_id'];
          
          //assigning faculty_id to variable 
           $_SESSION['faculty_id'] = $fac_id;
        }
        echo json_encode($row);
      } else if($row === 0) {
        echo json_encode($row);
      }
    }
  }

?>