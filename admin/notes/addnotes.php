<?php
	include("../../dbConnection.php");

	// header('Content-type: application/json');

	$isNoteAdded = false;

	print_r($_POST);
	print_r($_FILES);

	// $id = $_POST['subjectId'].$_POST['chapterNo'].rand(1,100);

	// //checking if there is reference to the assignment
	// $valid_extensions = array( 'pdf'); // valid extensions
	// $path = '../../mst_notes/'; // upload directory
	// if($_FILES['filename']['name']){
	// 	$fname = $_FILES['filename']['name'];
	// 	$tmp = $_FILES['filename']['tmp_name'];
	// 	// get uploaded file's extension
	// 	$ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
	// 	// can upload same image using rand function
	// 	$final_file = rand(1000,1000000).$fname;
	// 	// check's valid format
	// 	if(in_array($ext, $valid_extensions)) 
	// 	{ 
	// 		$path = $path.strtolower($final_file); 
	// 		move_uploaded_file($tmp,$path);
	// 	}else{
	// 		echo 'invalid';
	// 	}
	// }

	// $sql = "INSERT INTO mst_notes(mst_notes_id,subject_id,chapter_no,filename) 
	// 	VALUES ('".$id."','".$_POST['subjectId']."','".$_POST['chapterNo']."','".$path."')";
	// $query = mysqli_query($conn, $sql);

	// if($query){
	// 	$isNoteAdded = true;
	// }
	
	// echo $isNoteAdded;
?>
 
