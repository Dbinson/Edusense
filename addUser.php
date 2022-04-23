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
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row($result);
  echo json_encode($row);
  }

  // Inserting or Adding New Student
  if(isset($_POST['studsignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])){
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = password_hash($_POST['stupass'],PASSWORD_DEFAULT);

    $sql2 = "INSERT INTO student(stud_name,stud_email,password) VALUES ('".$stuname."','".$stuemail."', '".$stupass."');";
    $result2 = mysqli_query($conn, $sql2);

    if($result2){
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

      if($userLogRole == 103){
        $sql = "SELECT student_id,stud_email,password FROM student 
            WHERE user_email='".$userLogEmail."' AND password='".$userLogPass."'";
        $query = $conn->query($sql);
        if($query){
          if($row = mysqli_num_rows($query) == 1){
            while($result = mysqli_fetch_assoc($query)){
  
              //validate the password
              if(password_verify($pass,$result["password"])){
                $_SESSION['user_email'] = $result['email'];
                $_SESSION['is_login'] = true;
                $_SESSION['student_id'] = $result['student_id'];
                // echo "
                //   <script>
                //   $('#msg').append(\"<span class='bg-success p-4'>Login Success ......</span>\")
                //   setTimeout(()=>{
                //     window.location = \"./dashboard\";
                //   },1000)
                //   </script>     
                //   ";
              }else{
                // $msg = '<div class="p-3  bg-danger "> Login Faild. Try Again </div>';
              }
            }
          }
        }
      }
      
      // $sql = "SELECT user_id,user_email,user_password,role_id FROM user WHERE user_email='".$userLogEmail."' AND user_password='".$userLogPass."' AND role_id='".$userLogRole."'";
      // $query = $conn->query($sql);
      // $row = $query->num_rows;
      
      // if($row === 1){
      //   $rs=$query->fetch_assoc();
      //   $_SESSION['userId'] = $rs['user_id'];
      //   $_SESSION['logRole'] = $userLogRole;
      //   $_SESSION['userLogEmail'] = $userLogEmail;
      //   if($userLogRole = '103'){
      //     $_SESSION['isLoggedIn'] = true;
      //     //getting student id
      //     $sql3 = 'SELECT student_id FROM student WHERE user_id = "'.$rs['user_id'].'"';
      //     $query3 = $conn->query($sql3);
      //     $result3 = $query3->fetch_assoc();

      //     //assigning student_id to variable 
      //     $stud_id = $result3['student_id']; 

      //     //assigning student_id to variable 
      //     $_SESSION['student_id'] = $stud_id;

      //   }else{
      //     $_SESSION['is_fac_login'] = true;

      //      //getting faculty id
      //      $sql4 = 'SELECT faculty_id FROM faculty WHERE user_id ='.$re['user_id'];
      //      $query4 = $conn->query($sql4);
      //      $result4 = $query4->fetch_assoc();

      //      //assigning faculty_id to variable 
      //     $fac_id = $result4['faculty_id'];
          
      //     //assigning faculty_id to variable 
      //      $_SESSION['faculty_id'] = $fac_id;
      //   }
      //   echo json_encode($row);
      // } else if($row === 0) {
      //   echo json_encode($row);
      // }
    }
  }

?>