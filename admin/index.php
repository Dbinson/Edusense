<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js//bootstrap.js"></script>
    <script src="../js/jquery.js"></script>

    
<?php
    if(!isset($_SESSION)){
      session_start();
    }
    include_once('../dbConnection.php');
    if(isset($_REQUEST['logbtn'])){
      $email = $_REQUEST['login_mail'];
      $pass = $_REQUEST['login_pass'];
      $user_id;

      $sql = 'SELECT user_id,user_email,user_password FROM user WHERE user_email = "'.$email.'"AND role_id="101" AND user_password = "'.$pass.'"';
      $query = $conn->query($sql);
      if($query){
        if($row = $query->num_rows == 1){
          while($result = $query->fetch_assoc()){
            $user_id = $result['user_id'];
          }
          $_SESSION['user_id='] = $user_id;
          $_SESSION['is_admin_login'] = true;
          
          echo "

          <script>
            $('#formFooter').append(\"<span class='bg-success p-4'>Login Success ......</span>\")
            setTimeout(()=>{
              window.location = \"./dashboard\";
            },1000)
          </script>     
          ";
          
        }else{
          echo "
          <script>
          $('#formFooter').append(\"<span class='bg-success p-4'>Login Success ......</span>\")
        </script>     
          ";
        }
      }

    }
?>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
  

    <!-- Icon -->
    <div class="fadeIn first">
      <h1>Admin Login</h1> 
    </div>

    <!-- Login Form -->
    <form>
      <input type="email" id="login" class="fadeIn second" name="login_mail" required placeholder="Email">
      <input type="password" id="password" class="fadeIn third" name="login_pass" required placeholder="Password">
      <input type="submit" name="logbtn" class="fadeIn fourth" >
    </form>

    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

  </div>
</div>
</body>
</html>