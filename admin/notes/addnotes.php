<?php
	include("../../dbConnection.php");

	// header('Content-type: application/json');

	$isNoteAdded = false;

	if(isset($_POST['subjectId']) && isset($_POST['chapterNum']) && isset($_FILES['noteFile'])){
		$id = 'N'.$_POST['subjectId'].$_POST['chapterNum'].rand(1,100);

		//checking if there is reference to the assignment
		$valid_extensions = array( 'pdf'); // valid extensions
		$path = '../../mst_notes/'; // upload directory
		if($_FILES['noteFile']['name']){
			$fname = $_FILES['noteFile']['name'];
			$tmp = $_FILES['noteFile']['tmp_name'];
			// get uploaded file's extension
			$ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
			// can upload same image using rand function
			$final_file = rand(1000,1000000).$fname;
			// check's valid format
			if(in_array($ext, $valid_extensions)) 
			{ 
				$path = $path.strtolower($final_file); 
				move_uploaded_file($tmp,$path);

				$sql = "INSERT INTO mst_notes(mst_notes_id,subject_id,chapter_no,filename) 
					VALUES ('".$id."','".$_POST['subjectId']."','".$_POST['chapterNum']."','".$path."')";
				$query = mysqli_query($conn, $sql);
				if($query){
					$isNoteAdded = true;
				}
			}
		}
	}

	
	
	echo $isNoteAdded;
?>
 
