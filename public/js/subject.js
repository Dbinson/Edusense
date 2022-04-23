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
    console.log('Working')
    var id = $('#enrollBtn').data('id')
    // console.log(id)
    $.ajax({
        type: "post",
        url: "anrollProccess.php",
        data: id,
        dataType: "json",
        success: function (data) {
            console.log(data)
        }
    });
}

// $('document').on('click','.enrollBtn', function () {
//     // console.log($(this).data('id'))
//     console.log('working enroll')
// });