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
      
      $sql = "SELECT user_email,user_password,role_id FROM user WHERE user_email='".$userLogEmail."' AND user_password='".$userLogPass."' AND role_id='".$userLogRole."'";
      $result = $conn->query($sql);
      $row = $result->num_rows;
      
      if($row === 1){
        $_SESSION['is_login'] = true;
        $_SESSION['logRole'] = $userLogRole;
        $_SESSION['userLogEmail'] = $userLogEmail;
        echo json_encode($row);
      } else if($row === 0) {
        echo json_encode($row);
      }
    }
  }

?>