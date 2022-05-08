<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignUp</title>
    <link rel="stylesheet" href="./public/css/signInOut.css" />
    <link rel="stylesheet" href="./css/bootstrap.css">
  </head>
  <body class="rows">
    <div class="columns box left-box">
      <img src="./public/assets/blogging.png" alt="" />
    </div>
    <div class="columns box right-box">
      <form class="columns">
        <img src="./public/assets/MainLogo.png" alt="" /> 
        <div class="msg"></div>
        <h2>Welcome back, Signup</h2>
        <input type="text" required placeholder="Name" name="stuname" id="stuname">
        <input type="email" required placeholder="Email" name="stuemail" id="stuemail"/>
        <input type="password" required placeholder="Password" name="stupass" id="stupass"/>
        <button type="button" onclick="addUser()">Signup</button>
        <span>Already Registered? <a href="./login.php">Click here</a> </span>
      </form>
    </div>

    <?php include('./modals/studentRegModal.php'); ?>
    <script src="./js/jquery.js"></script>
    <script src="./public/js/ajaxrequest.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script
      src="https://kit.fontawesome.com/915fb40dfa.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
