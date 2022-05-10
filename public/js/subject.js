// import {addDetails} from './ajaxrequest.js'

$(document).on("click", ".openVideoModal", function () {
    var id = $(this).data('id');
    // console.log(id)
    $.ajax({
        type: "post",
        url: "./fetch.php",
        data: {
            id:id,
            type:'videoPath'
        },
        dataType:'json',
        success: function (data) {
            //  console.log(data)
            $('#videoPlayerModal').modal('show');
            $.each(data, function (i, val) { 
                // console.log(val.subject_id)
                $('#enrollBtn').data('id',val.subject_id)
                 $('#vid').attr('src',val.video_file.substr(7))
            });
        }
    });
});

$('#vid').bind('ended', function() {
    $('#enrollBtn').prop("disabled",false)
});

$('#videoPlayerModal').on('hide.bs.modal', function (e) {
    $("#vid").trigger("pause");
});


function enrollSub(){
    // console.log('Working')
    var id = $('#enrollBtn').data('id')
    // console.log(id)
    $.ajax({
        type: "post",
        url: "enrollProcess.php",
        data: {
            id:id
        },
        success: function (data) {
            // console.log(data)
            // var arr = data.split(',')
            if(data==1){
                $('#videoPlayerModal').modal('hide')
                window.location.href = "./student/dashboard"
            }else if(data == 0){
                window.location.href = "./login.php?enroll=1"
            }else if(data == -1){
                $('#enrollBtn').html('Already Enrolled');
            }else{
                $('#videoPlayerModal').modal('hide')    
                $('#studentRegModalCenter').modal('show')
                var arr = data.split(',')
                if(addDetails(arr[1])==1 ){
                    $('#successMsgs'.html(
                    '<small class="alert alert-success p4"> Success Loading..... </small>'
                    ));
                    setTimeout(() => {
                    window.location.href = "./login.php";
                    }, 1000);
                }else{
                    $('#successMsgs').html(
                    '<small class="alert alert-danger p4"> Failed Loading..... </small>'
                    );
                }
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
  
// $('document').on('click','.enrollBtn', function () {
//     // console.log($(this).data('id'))
//     console.log('working enroll')
// });