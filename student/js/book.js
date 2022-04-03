function sndreq(chapter_id,subject_id){
    $.ajax({url:"bookRequest.php",
        type:"POST",
        data:{
            chapterID: chapter_id,
            subjectID: subject_id
        },
        dataType: "text",
        success:function(result){
            $(".requestSubmit").text(result);
            // $(".requestSubmit").attr('disabled',true);
        },error: function(){
            alert("Error");
    }
    });
} 