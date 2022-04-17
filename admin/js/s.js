function addsub() {
    var subject_name = $("#subject_name").val();
    var class_name = $("#class_name").val();

    $.ajax({url:"addsubject.php",
                type:"POST",
                data:{
                    subject_name: subject_name,
                    class_name : class_name
                },
                dataType: "text",
                success: function(data) {
                  console.log(data);
                    if (data == 0) {
                        $("#successMsg").html(
                          '<small class="alert alert-danger">insert falied ! </small>'
                        );
                      } else if (data == 1) {
                        $("#successMsg").html(
                          '<small class="alert alert-success"> Success! Loading..... </small>'
                        );
                        // Empty Fields
                        clearFieldSubject("#addsubjectForm");

                        setTimeout(() => {
                          $('#addsubjectModalCenter').modal('hide');
                          location.reload();
                        }, 1000);
                      }
                  }
            });
}
function clearFieldSubject(id){
  $(id).trigger('reset');
}

// delete the subject
$(document).ready(function () {
  $('.deletebtn').on('click', function () {
    var id = $(this).attr('id')
    $.ajax({
      type: "post",
      url: "../delete.php",
      data: {
        requestType: 'subject',
        id:id
      },
      success: function (data) {
        // console.log(data)
        if(data == '1'){
          location.reload()
        }
      }
    });
  })
});


$(document).ready(function () {

    $('.editsubjectbtn').on('click', function () {

      var id = $(this).attr('id');
      // console.log(id)

        $.ajax({
          type: "post",
          url: "../fetch.php",
          data: {
            request: 'subUpdate',
            id: id
          },
          dataType: "json",
          success: function (data) {
            // console.log(data);
            $.each(data,(index, val)=>{
              // console.log(val)
              $('#subId').val(val.subject_id)
              $('#selectSubject').val(val.name)
              $('#className').val(val.class)
            })
            // console.log($('#subId').val())
            $('#updatesubjectModalCenter').modal('show')
          }
        });
    });

});
function updatesub() {

    var subject_id = $('#subId').val()
    var subject_name = $("#selectSubject").val();
    var class_name = $("#className").val();

    $.ajax({url:"updatesubject.php",
      type:"POST",
      data:{
          subject_id: subject_id,
          subject_name: subject_name,
          class_name : class_name
      },
      dataType: "text",
      success: function(data) {
        console.log(data)
          if (data == 0) {
              $("#successMsg").html(
                '<small class="alert alert-danger">falied ! </small>'
              );
            } else if (data == 1) {
              $("#successMsg").html(
                '<small class="alert alert-success"> Success!</small>'
              );
              // Empty Login Fields
              // clearField();
              setTimeout(() => {
                $('#updatesubjectModalCenter').modal('hide')
                location.reload()
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

