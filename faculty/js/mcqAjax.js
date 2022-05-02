	// add mcq

    $(document).ready(function (e) {
        $("#addMcqForm").on('submit',(function (e) {
            
            $.ajax({
                url:"addmcq.php",
                type:"post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data){
                    console.log(data)
                    if (data == 1) {
                        clearField("#addMcqForm");
    
                        setTimeout(() => {
                          prompt('Created')
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
    //update mcq
    
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
                  $('#note_id').val(val.mst_mcq_id)
                  $('#subject_Id').val(val.subject_id)
                  $('#chapterNo').val(val.chapter_no)
                  $('#stud_Id').val(val.student_id)
                  $('#prevFile').val(val.filename)
                })
                $('#updatemcqModalCenter').modal('show')
              }
            });
        });
    
    });
    
    $(document).ready(function (e) {
        $("#updatemcqForms").on('submit',(function (e) {
        
        $.ajax({
          url:"updatemcq.php",
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
                requestType: 'mcq',
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