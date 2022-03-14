function addc() {
        var course_name = $("#course_name").val();
        var board_name = $("#board_name").val();
        var course_desc = $("#course_desc").val();
        var course_image = $("#course_image").val();

        $.ajax({url:"addcourse.php",
                    type:"POST",
                    data:{
                        course_name: course_name,
                        board_name : board_name,
                        course_desc : course_desc,
                        course_image : course_image
                    },
                    dataType: "text",
                    success: function(data) {
                        if (data == 0) {
                            $("#successMsg").html(
                              '<small class="alert alert-danger">insert falied ! </small>'
                            );
                          } else if (data == 1) {
                            $("#successMsg").html(
                              '<small class="alert alert-success"> Success! Loading..... </small>'
                            );
                            // Empty Login Fields
                            clearField();
                            setTimeout(() => {
                              window.location.href = "./index.php";
                            }, 1000);
                          }
                      }
                });
}
var d=0
$(document).ready(function () {

    $('.editcoursebtn').on('click', function () {

        $('#updatecourseModalCenter').modal('show');

          d=$("#id").val();
         
          console.log(d)
    });

});
function updatec() {
    var course_id = d
    var course_name = $("#select_name").val();
    var board_name = $("#select_board").val();
    var course_desc = $("#c_desc").val();
    var course_image = $("#c_img").val();
    $.ajax({url:"updatecourse.php",
                type:"POST",
                data:{
                    course_id: course_id,
                    course_name: course_name,
                    board_name : board_name,
                    course_desc : course_desc,
                    course_image : course_image
                },
                dataType: "text",
                success: function(data) {
                    if (data == 0) {
                        $("#successMsg").html(
                          '<small class="alert alert-danger">insert falied ! </small>'
                        );
                      } else if (data == 1) {
                        $("#successMsg").html(
                          '<small class="alert alert-success"> Success! Loading..... </small>'
                        );
                        // Empty Login Fields
                        clearField();
                        setTimeout(() => {
                          window.location.href = "./index.php";
                        }, 1000);
                      }
                  }
            });
}
function addsub() {
    var subject_name = $("#subject_name").val();
    var course_name = $("#course_select").val();
    var class_name = $("#class_name").val();

    $.ajax({url:"addsubject.php",
                type:"POST",
                data:{
                    subject_name: subject_name,
                    course_name : course_name,
                    class_name : class_name
                },
                dataType: "text",
                success: function(data) {
                    if (data == 0) {
                        $("#successMsg").html(
                          '<small class="alert alert-danger">insert falied ! </small>'
                        );
                      } else if (data == 1) {
                        $("#successMsg").html(
                          '<small class="alert alert-success"> Success! Loading..... </small>'
                        );
                        // Empty Login Fields
                        clearField();
                        setTimeout(() => {
                          window.location.href = "./index.php";
                        }, 1000);
                      }
                  }
            });
}
var d=0
$(document).ready(function () {

    $('.editsubjectbtn').on('click', function () {

        $('#updatesubjectModalCenter').modal('show');

          d=$("#sub").val();
         
          console.log(d)
    });

});
function updatesub() {

    var subject_id = d
    var subject_name = $("#select_subject").val();
    var course_name = $("#c_name").val();
    var class_name = $("#class_select").val();

    $.ajax({url:"updatesubject.php",
                type:"POST",
                data:{
                    subject_id  : subject_id,
                    subject_name: subject_name,
                    course_name : course_name,
                    class_name : class_name
                },
                dataType: "text",
                success: function(data) {
                    if (data == 0) {
                        $("#successMsg").html(
                          '<small class="alert alert-danger">insert falied ! </small>'
                        );
                      } else if (data == 1) {
                        $("#successMsg").html(
                          '<small class="alert alert-success"> Success! Loading..... </small>'
                        );
                        // Empty Login Fields
                        clearField();
                        setTimeout(() => {
                          window.location.href = "./index.php";
                        }, 1000);
                      }
                  }
            });
}


//assign demo ajax
console.log('Working')
var d
$(document).on('click', '.acbtn', function(){ 
    console.log('dca')

      $('#assignDemoModalCenter').modal('show');

        data=$(this).attr("id")
       
        $('#reg_id').val(data)
  });


function assD(){
  var demo_reg_id =$('#reg_id').val()
  var faculty_id=$('#faculty_id').val()
  var datetime=$('#dt').val()
  var meet_link =$('#ml').val()

  $.ajax({url:"assignDemo.php",
    type:"POST",
    data:{
        demo_reg_id:demo_reg_id,
        faculty_id:faculty_id,
        datetime:datetime,
        meet_link:meet_link
    },
    dataType: "json",
    success: function(data) {

    }
  });
}

