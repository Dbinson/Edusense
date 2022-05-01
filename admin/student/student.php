<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Student');
    define('PAGE', 'users');
    include('../mainInclude/header.php');
    include('../modals/updateStudentModal.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }

?>
<section id="content">
    <div class="container p-4">
        <h3>Students</h3>
       <table class="table table-striped table-bordered table-hover ">
           <thead>
               <tr>
                   <th>#</th>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Mobile</th>
                   <th>Address</th>
                   <th>Parents</th>
                   <th>Update</th>
                   <th>Remove</th>
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = "SELECT * FROM student
                        ";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['student_id']    .'</td>
                            <td>'.$row['stud_name'].'</td>
                            <td>'.$row['stud_email'].'</td>
                            <td>'.$row['stud_mobile'].'</td>
                            <td>'.$row['address'].'</td>
                            <td> <a href="" >View </a></td>

                            <td>
                            <button name="updatebtn" class="btn btn-outline-success updatebtn btn-sm" type="submit" id="'.$row['student_id'].'"><span class="material-icons">update</span>
                        </td>
                        <td>
                            <button name="deletebtn" class="btn btn-outline-danger deletebtn btn-sm" type="submit" id="'.$row['student_id'].'"><span class="material-icons">delete</span>
                            </button>
                        </td>
                        </tr>
                        ';
                    }               

                ?>
           </tbody>
       </table>
        
    </div>
       
</section>
</div>
<script>
    //update student
        
    $(document).ready(function () {
        $('.updatebtn').on('click', function () {
            var id = $(this).attr('id');
            // console.log(id)
            $.ajax({
                type: "post",
                url: "../fetch.php",
                data: {
                    request: 'studUpdate',
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $.each(data,(index, val)=>{
                    // console.log(val)
                    $('#stud_id').val(val.student_id)
                    $('#studentName').val(val.stud_name)
                    $('#studentMobile').val(val.stud_mobile)
                    $('#studentEmail').val(val.stud_email)
                    $('#address').val(val.address)
                    $('#parentName').val(val.parent_name)
                    $('#parentMobile').val(val.parent_mobile)
                    $('#parentEmail').val(val.parent_email)
                    })
                    $('#updateStudentModal').modal('show')
                }
            });
    });

    });

    $(document).ready(function (e) {
    $("#updateStudentForm").on('submit',(function (e) {
		
		$.ajax({
			url:"updateStudent.php",
			type:"post",
			data: new FormData(this),
			processData: false,
			contentType: false,
			success: function (data){
				console.log(data)
                $('#updateStudentModal').modal('hide')
			    location.reload();
			}
		});
		e.preventDefault();
    }));
});

    //delete Student
    $(document).ready(function () {
        $('.deletebtn').on('click', function () {
            var id = $(this).attr('id')
            $.ajax({
            type: "post",
            url: "../delete.php",
            data: {
                requestType: 'student',
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

</script>
<?php include('../mainInclude/footer.php'); ?>