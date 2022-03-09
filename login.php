<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/signInOut.css" />
  </head>
  <body class="rows">
    <div class="columns box left-box">
      <img src="./public/assets/blogging.png" alt="" />
    </div>
    <div class="columns box right-box">
      <form class="columns">
        <img src="./public/assets/MainLogo.png" alt="" />
        <h2>Welcome back, Login</h2>
        <input type="email" placeholder="Email" name="userLogEmail" id="userLogEmail" />
        <select required name="userLogRole" id="userLogRole">
          <option disabled >Select Role</option>
          <option value="103" default>Student</option>
          <option value="102">Faculty</option>
        </select>
        <input type="password" placeholder="Password" name="userLogPass" id="userLogPass"/>
        <button type="button" onclick="checkUserLogin()">Login</button>
        <span>Didn't Registered Yet? <a href="./signup.php">Click here</a> </span>
      </form>
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./public/js/ajaxrequest.js"></script>
    <script
      src="https://kit.fontawesome.com/915fb40dfa.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
