
// addbook
console.log('dsvsdklvsdn')
function addBooks() {
	console.log('sdgdsg')
	var selectSub = $("#select_subject").val();
	var bookCoverimg = $("#book_cover_img").val();
	var selectClass = $("#select_class").val();
	var chapterName = $("#cn").val();
	var chapterNo = $("#cno").val();
	var chapterFile = $("#cf").val();
	
	$.ajax({
	  url: "addbook.php",
	  type: "post",
	  data: {
		subject_id: selectSub,
		bookImage: bookCoverimg,
		class_id: selectClass,
		chapterName: chapterName,
		chapterNum: chapterNo,
		chapterFile: chapterFile
	  },
	   dataType: "text",
	  success: function(data) {
		if (data == 0) {
			$("#successMsg").html(
			  '<small class="alert alert-danger">insert falied ! </small>'
			);
		  } else if (data == 1) {
			$("#successMsg").html(
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


  
  // Empty Login Fields
function clearField() {
	$("#addBookForm").trigger("reset");
  }


  


// editbook

   $(document).ready(function () {

            $('.editbookbtn').on('click', function () {

                $('#EditBookModalCenter').modal('show');

                 var data=$("#id").val();
				 $('#update_id').val(data)

            });

		

        });

  
		function editButton() {
			console.log('HV ')
			var updateId=$("#update_id").val()	

				var selectSub = $("#subject_name").val();
				var bookCoverimg = $("#book_cover_img").val();
				var selectClass = $("#class_name").val();
				console.log(updateId)
				
			$.ajax({
				url: "editbook.php",
				type: "post",
				data: {
					update_id:updateId,
				  subject_id: selectSub,
				  bookImage: bookCoverimg,
				  class_id: selectClass,
				  
				},
				 dataType: "text",
				success: function(data) {
				  if (data == 0) {
					  $("#successMsg").html(
						'<small class="alert alert-danger">insert falied ! </small>'
					  );
					} else if (data == 1) {
					  $("#successMsg").html(
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



		  
// editchapter

var d=0
$(document).ready(function () {

	$('.editChaptersBtn').on('click', function () {

		$('#EditChapterModalCenter').modal('show');

		  d=$("#id").val();
		 
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
		 

				
		
		// add chapter

function aChapters() {
	console.log('sdgdsg')
	 var book_id=$("#bid").val();
	var chapterName = $("#chapterName").val();
	var chapterNo = $("#chapterNum").val();
	var chapterFile = $("#chapterFile").val();
	
	console.log(book_id);
	$.ajax({
	  url: "addchapter.php",
	  type: "post",
	  data: {
		  book_id:book_id,
		chapterName: chapterName,
		chapterNo: chapterNo,
		chapterFile: chapterFile
	  },
	   dataType: "text",
	  success: function(data) {
		if (data == 0) {
			$("#successMsg").html(
			  '<small class="alert alert-danger">insert falied ! </small>'
			);
		  } else if (data == 1) {
			$("#successMsg").html(
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
		