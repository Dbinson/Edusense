<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Faculty');
    define('PAGE', 'users');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');
    include('../modals/updateFacultyModal.php');

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }

?>
<section id="content">
    <div class="container p-4">
        <h3>Faculty</h3>
       <table class="table table-striped table-bordered table-hover ">
           <thead>
               <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Join Date</th>
                    <th>Address</th>
                    <th>Update</th>
                    <th>Remove</th>
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = " SELECT * FROM faculty
                        ";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['faculty_id'].'</td>
                            <td>'.$row['faculty_name'].'</td>
                            <td>'.$row['faculty_email'].'</td>
                            <td>'.$row['faculty_mobile'].'</td>
                            <td>'.$row['join_date'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>
                                <button name="updatebtn" class="btn btn-outline-success updatebtn btn-sm" type="submit" id="'.$row['faculty_id'].'"><span class="material-icons">update</span>
                            </td>
                            <td>
                                <button name="deletebtn" class="btn btn-outline-danger deletebtn btn-sm" type="submit" id="'.$row['faculty_id'].'"><span class="material-icons">delete</span>
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
    //update
    $(document).ready(function () {
        $('.updatebtn').on('click', function () {
            var id = $(this).attr('id');
            // console.log(id)
            $.ajax({
                type: "post",
                url: "../fetch.php",
                data: {
                    request: 'facUpdate',
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $.each(data,(index, val)=>{
                    // console.log(val)
                    $('#fac_id').val(val.faculty_id)
                    $('#facultyName').val(val.faculty_name)
                    $('#facultyMobile').val(val.faculty_mobile)
                    $('#facultyEmail').val(val.faculty_email)
                    $('#address').val(val.address)
                    $('#joinDate').val(val.join_date)
                    })
                    $('#updateFacultyModal').modal('show')
                }
            });
    });

    });

    $(document).ready(function (e) {
    $("#updateFacultyForm").on('submit',(function (e) {
		
		$.ajax({
			url:"updatefaculty.php",
			type:"post",
			data: new FormData(this),
			processData: false,
			contentType: false,
			success: function (data){
				console.log(data)
                $('#updateFacultyModal').modal('hide')
			    location.reload();
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
                requestType: 'faculty',
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