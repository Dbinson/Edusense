$(document).ready(function (e) {
    $("#addAssForm").on('submit',(function (e) {
		$.ajax({
			url:"./addAssignment.php",
			type:"post",
			data: new FormData(this),
			processData: false,
			contentType: false,
			success: function (data){
				console.log(data)
                if (data == 0) {
                    $("#successMsg").html(
                      '<small class="alert alert-danger w-100">insert falied ! </small>'
                    );
                  } else if (data == 1) {
                    $("#successMsg").html(
                      '<small class="alert alert-success w-100"> Success!</small>'
                    );
                    // Empty Fields
                    clearField("#addAssForm");
                    setTimeout(() => {
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