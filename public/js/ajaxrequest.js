//Add user student
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
      // console.log(data);
      if (data == 'Failed') {
        
      } else if (data == 'OK') {
        console.log("completed")
        // Empty Login Fields
        // clearAdminLoginField();
        setTimeout(() => {
          window.location.href = "login.php";
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
        // console.log(data);
        if (data == 0) {
         
        } else if (data == 1) {
         console.log("working")
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