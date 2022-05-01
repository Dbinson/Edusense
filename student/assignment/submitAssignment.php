<?php
    include('../../dbConnection.php');
    if(!isset($_SESSION)){
        session_start();
    }

    date_default_timezone_set('Asia/Kolkata');
    $isSubmitted = 0;
    
    if(isset($_FILES['submitionFile']) && isset($_POST['ass_Id'])){

        $valid_extensions = array( 'pdf' , 'doc'); // valid extensions
        $path = '../../assignment-submission/'; // upload directory

        $f = $_FILES['submitionFile']['name'];
        $tmp = $_FILES['submitionFile']['tmp_name'];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_file = rand(1000,1000000).$f;
        // check's valid format
        if(in_array($ext, $valid_extensions)){ 
            $path = $path.strtolower($final_file); 
            if(move_uploaded_file($tmp,$path)){
                //Update form data in the database
                $sql = "UPDATE assignment SET 
                    submited_date = '".date('Y/m/d H:i:s')."',
                    submitted_file = '".$path."'
                    WHERE assignment_id = '".$_POST['ass_Id']."'
                ";
                $query = mysqli_query($conn,$sql);
                if($query){
                    $isSubmitted = 1;
                }else{
                    echo 'faild';
                }
            }
        }
    }

    echo $isSubmitted;
?>