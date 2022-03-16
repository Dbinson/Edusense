$(document).ready(function (e) {
    $("#addAssForm").on('submit',(function(e) {
      e.preventDefault()
      $.ajax({
        url:"addAssessment.php",
        type:"post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data){
        //   location.reload();
        }
      });
    }));
});