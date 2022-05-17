<?php
	include("../../dbConnection.php");

	header('Content-type: application/json');

	$isNoteAdded = 0;

	$id = 'DEMO'. $_POST['subjectId'];

	//checking if there is reference to the assignment
	$valid_extensions = array( 'mp4','mov','avi','mkv','wvm'); // valid extensions
	$path = '../../demo-Recordings/'; // upload directory
	if($_FILES['demoFile']){
		$fname = $_FILES['demoFile']['name'];
		$tmp = $_FILES['demoFile']['tmp_name'];
		// get uploaded file's extension
		$ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
		// can upload same image using rand function
		$final_file = rand(1000,1000000).$fname;
		// check's valid format
		if(in_array($ext, $valid_extensions)) 
		{ 
			$path = $path.strtolower($final_file); 
			move_uploaded_file($tmp,$path);

            // insert the data into db
            $sql = "INSERT INTO demo(demo_id,subject_id,video_file) 
		    VALUES ('".$id."','".$_POST['subjectId']."','../".$path."')";
            $query = mysqli_query($conn, $sql);

            if($query){
                $isNoteAdded = 1;
            }
		}else{
			$isNoteAdded = -1;
		}
	}
	
	echo $isNoteAdded;
?>
 
