	// add notes

$(document).ready(function (e) {
    $("#addNotesForms").on('submit',(function (e) {
		
		$.ajax({
			url:"addnotes.php",
			type:"post",
			data: new FormData(this),
			processData: false,
			contentType: false,
			success: function (data){
				console.log(data)
				if (data == 1) {
                    $("#successMsg").html(
                      '<small class="alert alert-success"> Success! Loading..... </small>'
                    );
                    // Empty Fields
                    clearField("#addNotesForms");

                    setTimeout(() => {
                      $('#addNotesModalCenter').modal('hide');
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
//update notes

$(document).ready(function () {

    $('.updateNotebtn').on('click', function () {

      var id = $(this).attr('id');
      console.log(id)

        $.ajax({
          type: "post",
          url: "../fetch.php",
          data: {
            request: 'facNoteUpdate',
            id: id
          },
          dataType: "json",
          success: function (data) {
            console.log(data);
            $.each(data,(index, val)=>{
              // console.log(val)
			  $('#note_id').val(val.mst_notes_id)
              $('#subject_Id').val(val.subject_id)
              $('#chapterNo').val(val.chapter_no)
			  $('#stud_Id').val(val.student_id)
			  $('#prevFile').val(val.filename)
            })
            $('#updateNotesModalCenter').modal('show')
          }
        });
    });

});

$(document).ready(function (e) {
	$("#updateNotesForms").on('submit',(function (e) {
	
	$.ajax({
	  url:"updateNotes.php",
	  type:"post",
	  data: new FormData(this),
	  processData: false,
	  contentType: false,
	  success: function (data){
		// console.log(data)
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
	e.preventDefault();
	}));
  });


  //delete
  $(document).ready(function () {
	$('.deletebtn').on('click', function () {
		var id = $(this).attr('id')
		$.ajax({
		type: "post",
		url: "../delete.php",
		data: {
			requestType: 'notes',
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

 //delete
 $(document).ready(function () {
	$('.deletebtn').on('click', function () {
		var id = $(this).attr('id')
		$.ajax({
		type: "post",
		url: "../delete.php",
		data: {
			requestType: 'notes',
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