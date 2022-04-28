$(document).ready(function (e) {
    $("#addDemoForm").on('submit',(function (e) {
      
		
		$.ajax({
			url:"./adddemo.php",
			type:"post",
			data: formdata,
			processData: false,
			contentType: false,
			success: function (data){
				// console.log(data)
                if (data == 0) {
                    $("#successMsg").html(
                      '<small class="alert alert-danger">insert falied ! </small>'
                    );
                  } else if (data == 1) {
                    $("#successMsg").html(
                      '<small class="alert alert-success"> Success! Loading..... </small>'
                    );
                    // Empty Fields
                    clearField("#addDemoForm");

                    setTimeout(() => {
                      $('#addDemoModalCenter').modal('hide');
                      location.reload();
                    }, 1000);
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