$(document).ready(function (e) {
    $("#addExamForm").on('submit',(function(e) {
      e.preventDefault()
      $.ajax({
        url:"addexam.php",
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

$(document).on('click', '.editexam', function(){ 

      $('#EditExamModalCenter').modal('show');

        d=$(this).attr("id")

        $.ajax({
            type: "post",
            url: "fetch.php",
            data: {
                id : d
            },
            success: function (data) {
                $.each(data, function (i, val) { 
                    $('#ex_id').val(d)
                    $('#exam_name').val(val.exam_name)
                    $('#exam_date_time').val(val.exam_date_time)
                    $('#examtype').val(val.examtype)
                    $('#subject_id').val(val.subject_id)
                });
            }
        });
  });

  $(document).ready(function (e) {
    $("#editExamForm").on('submit',(function(e) {
      e.preventDefault()
      $.ajax({
        url:"editexam.php",
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