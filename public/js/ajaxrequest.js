//Add user
function addUser(){
  var stuname = $("#stuname").val()
  var stuemail = $("#stuemail").val()
  var stupass = $("#stupass").val()
  console.log(stuname)

  $.ajax({
    url: "addUser.php",
    type: "post",
    data: {
      studsignup: "studsignup",
      stuname: stuname,
      stupass: stupass,
      stuemail: stuemail,
      role: "103"
    },
    success: function(data) {
      console.log(data);
      if (data == 'Failed') {
        $("#successMsg").html(
          '<small class="alert alert-danger"> Failed to Signup ! </small>'
        );
      } else if (data == 1) {
        $("#successMsg").html(
          '<small class="alert alert-success"> Success! Loading..... </small>'
        );
        // Empty Login Fields
        // clearAdminLoginField();
        setTimeout(() => {
          window.location.href = "index.php";
        }, 1000);
      }
    }
  });
}

//Login user
function checkUserLogin(){
    var userLogEmail = $("#userLogEmail").val()
    var userLogRole = $("#userLogRole").val()
    var userLogPass = $("#userLogPass").val()

    $.ajax({
      url: "addUser.php",
      type: "post",
      data: {
        checkLogemail: "checklogmail",
        userLogEmail: userLogEmail,
        userLogPass: userLogPass,
        userLogRole: userLogRole
      },
      success: function(data) {
        console.log(data);
        if (data == 0) {
          $("#statusLogMsg").html(
            '<small class="alert alert-danger"> Invalid Email ID or Password ! </small>'
          );
        } else if (data == 1) {
          $("#statusLogMsg").html(
            '<small class="alert alert-success"> Success! Loading..... </small>'
          );
          // Empty Login Fields
          clearLoginField();
          setTimeout(() => {
            //window.location.href = "./index.php";
          }, 1000);
        }
      }
    });
  }
  

  // Empty Login Fields
function clearLoginField() {
  $("#adminLoginForm").trigger("reset");
}

// Empty Login Fields and Status Msg
function clearLoginWithStatus() {
  $("#statusAdminLogMsg").html(" ");
  clearAdminLoginField();
}