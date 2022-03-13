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
          console.log('failed');
        }else if(data == 1){
         console.log("working")
          // Empty Login Fields
          // clearLoginField();
          setTimeout(() => {
            window.location.href = "./index.php";
          }, 1000);
        }
      }
    });
  }

  $(document).ready(function (){
    $(".courseForm").on('submit',(function(e) {
      e.preventDefault()
      $.ajax({
        url:"fetch.php",
        type:"post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data){
          console.log(data);
          var subjectData = ''; 
          var i=1
          $.each(data,(index, val) => {
            // const val = data[index];
            subjectData += '<tr>';
            subjectData += '<td>'+(i++)+'</td>';
            subjectData += '<td>'+val.subject_name+'</td>';
            subjectData += '<td><a href="fetch.php?s_id='+val.subject_id+'&q=bookDemo" role="button"class="btn btn-outline-warning demobookbtn">Book the demo</td>';
            subjectData += '</tr>';
        });
        console.log(subjectData)
        $('.table tbody').append(subjectData);
        //   location.reload();
        }
      });
    }));
  });
  

//   // Empty Login Fields
// function clearLoginField() {
//   $("#adminLoginForm").trigger("reset");
// }

// // Empty Login Fields and Status Msg
// function clearLoginWithStatus() {
//   $("#statusAdminLogMsg").html(" ");
//   clearAdminLoginField();
// }