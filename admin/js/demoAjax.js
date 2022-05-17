$(document).ready(function (e) {
    $("#addDemoForm").on('submit',(function (e) {
      
		
		$.ajax({
			url:"./adddemo.php",
			type:"post",
			data: new FormData(this),
			processData: false,
			contentType: false,
			success: function (data){
				console.log(data)
      if (data == 0) {
          $("#successdemoMsg").html(
            '<small class="alert alert-danger">Falied ! </small>'
          );
        } else if (data == 1) {
          $("#successdemoMsg").html(
            '<small class="alert alert-success"> Added Successfully </small>'
          );
          // Empty Fields
          clearField("#addDemoForm");

          setTimeout(() => {
            $('#addDemoModalCenter').modal('hide');
            location.reload();
          }, 1000);
        }else if (data == -1) {
          console.log('hjefg')
          $("#successdemoMsg").html(
            '<small class="alert alert-danger"> Please input MP4, MOV , MKV file Format </small>'
          );
        }
			}
		});
		e.preventDefault();
    }));
});

function clearField(id){
    $(id).trigger('reset');
  }
  
// delete the demo
$(document).ready(function () {
    $('.deletebtn').on('click', function () {
      var id = $(this).attr('id')
      $.ajax({
        type: "post",
        url: "../delete.php",
        data: {
          requestType: 'demo',
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