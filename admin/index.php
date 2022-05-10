<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.js"></script>

    
<?php
    if(!isset($_SESSION)){
      session_start();
    }
    include_once('../dbConnection.php');
    if(isset($_REQUEST['logbtn'])){
      $email = $_REQUEST['login_mail'];
      $pass = $_REQUEST['login_pass'];

      $sql = 'SELECT id,email,password FROM mst_admin WHERE email = "'.$email.'"';
      $query = $conn->query($sql);
      if($query){
        if($row = mysqli_num_rows($query) == 1){
          while($result = mysqli_fetch_assoc($query)){

            //validate the password
            if(password_verify($pass,$result["password"])){
              $_SESSION['user_email'] = $result['email'];
              $_SESSION['is_admin_login'] = true;
              $msg = '<div class="p-3  alert- success> Login successful.  </div>';
            }else{
              $msg = '<div class="p-3  alert-danger "> Login Faild. Try Again </div>';
            }
          }
        }else{
          echo "
          <script>
          $('#formFooter').append(\"<span class='bg-success p-4'>Admin not registered</span>\")
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
      
      
       <?php if(isset($msg)){ echo $msg; } ?>
      <span id="successMsg"></span>
      </div>  
    </form>
    
    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->

  </div>
</div>
</body>
</html>