//Add user student
function addUser(){
  var stuname = $("#stuname").val()
  var stuemail = $("#stuemail").val()
  var stupass = $("#stupass").val()
  // console.log(stuname)

  $.ajax({
    url: "addUser.php",
    type: "post",
    data: {
      studsignup: "studsignup",
      stuname: stuname,
      stupass: stupass,
      stuemail: stuemail,
    },
    success: function(data) {
      // console.log(data);
      if (data[1]== 'Failed') {
        
      } else if (data[1] == 'OK') {
        // console.log("completed")

        $("#successMsg").html(
          '<small class="alert alert-success"> Registered Loading..... </small>'
        );       
        setTimeout(() => {
          
          $('#studentRegModalCenter').modal('show')
          var upd = addDetails(data[0])
          // console.log(upd)
          if( upd == 1){
            
            $('#successMsgss'.html(
              '<small class="alert alert-success p-4"> Success Loading..... </small>'
            ));
            clearField('addDeatilsStudForm')
            
            setTimeout(() => {
              $('#studentRegModalCenter').modal('hide')
              window.location.href = "./login.php";
            }, 1000);
          }else if(upd == 0) {
            $('#successMsgss').html(
              '<small class="alert alert-danger p-4"> Failed Loading..... </small>'
            );
          }
        }, 1000);
      }
    }
  });
}

function addDetails(id){
  $("#addDeatilsStudForm").on('submit',(function (e) {
      var formdata = new FormData(this)
      formdata.append('addstuddetails','addstuddetails')
      formdata.append('id',id)
		
		$.ajax({
			url:"./addUser.php",
			type:"post",
			data: formdata,
			processData: false,
			contentType: false,
			success: function (data){
				console.log("jhbhjbvgvgv".data)

          return data
    
			}
		});
		e.preventDefault();
    }));
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
            // console.log($('#successMsg'))
            $("#successMsg").html(
              '<small class="alert alert-danger px-5">Invalid Credentials  ! </small>'
            );
          } else if (data == 1) {

              $("#successMsg").html(
                '<small class="alert alert-success px-3"> Success! Loading..... </small>'
              );
              // Empty Fields
              clearField("#loginForm");
              
            setTimeout(() => {
                window.location.href = "./index.php";
            }, 1000);
        }
      }
    });
  }
//clear field
  function clearField(id){
    $(id).trigger('reset');
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
  
// export {addDetails}
//   // Empty Login Fields
// function clearLoginField() {
//   $("#adminLoginForm").trigger("reset");
// }

// // Empty Login Fields and Status Msg
// function clearLoginWithStatus() {
//   $("#statusAdminLogMsg").html(" ");
//   clearAdminLoginField();
// }