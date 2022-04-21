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
            // console.log(data)
            $('#videoPlayerModal').modal('show');
            $.each(data, function (i, val) { 
                $('#enrollBtn').data('id',val.id)
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
    console.log($('#enrollBtn').data('id'))
}

// $('document').on('click','.enrollBtn', function () {
//     // console.log($(this).data('id'))
//     console.log('working enroll')
// });