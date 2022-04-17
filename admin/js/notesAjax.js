$(document).ready(function () {

	$('.editChaptersBtn').on('click', function () {

		$('#EditChapterModalCenter').modal('show');

		//   d=$("#id").val();
		 
		//   console.log(d)
	});
});


function editChapters() {

	// console.log('HV')
	var updateId=d

		var chapterName = $("#chapter_name").val();
		var chapterFile = $("#chapter_file").val();
		var chapterno = $("#chapter_no").val();
		// console.log(updateId)
		
	$.ajax({
		url: "editchapter.php",
		type: "post",
		data: {
			update_id:updateId,
		  chapterName: chapterName,
		  chapterFile: chapterFile,
		  chapterno: chapterno,
		  
		},
		 dataType: "text",
		 success: function(data) {
			//  console.log(data)
		  if (data == 0) {
			  $(".successMsg").html(
				'<small class="alert alert-danger">insert falied ! </small>'
			  );
			} else if (data == 1) {
			  $(".successMsg").html(
				'<small class="alert alert-success"> Success! Loading..... </small>'
			  );
			  // Empty Login Fields
			  clearField();
			  setTimeout(() => {
				window.location.href = "./index.php";
			  }, 1000);
			}
		}
	  });
  }
		 
  $( 'form' ).submit(function ( e ) {
    var data;

    data = new FormData();
    data.append( 'file', $( '#file' )[0].files[0] );

    $.ajax({
        url: 'http://hacheck.tel.fer.hr/xml.pl',
        data: data,
        processData: false,
        type: 'POST',
        success: function ( data ) {
            alert( data );
        }
    });

    e.preventDefault();
});
				
		
// add notes

$(document).ready(function (e) {
    $(".addNotesForm").on('submit',(function (e) {
		e.preventDefault();
		$.ajax({
			url:"addnotes.php",
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


// function addNote() {
// 	// console.log('sdgdsg')
// 	var subjectId = $("#subjectId").val();
// 	var chapterNo = $("#chapterNum").val();
// 	var filename = $("#noteFile").val();
// 	var form = $('#addNotesForm')
	
// 	$.ajax({
// 	  url: "addnotes.php",
// 	  type: "post",
// 	  data: new FormData(),
// 	  contentType: false,
// 	  processData: false,
// 		dataType: "text",
// 	  success: function(data) {
// 		// if (data == 0) {
// 		// 	$("#successMsg").html(
// 		// 	  '<small class="alert alert-danger">insert falied ! </small>'
// 		// 	);
// 		//   } else if (data == 1) {
// 		// 	$("#successMsg").html(
// 		// 	  '<small class="alert alert-success"> Success! Loading..... </small>'
// 		// 	);
// 		// 	// Empty Login Fields
// 		// 	clearField();
// 		// 	setTimeout(() => {
// 		// 	  window.location.href = "./index.php";
// 		// 	}, 1000);
// 		//   }
// 	  }
// 	});
// }
		