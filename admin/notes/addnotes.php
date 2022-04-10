<?php
include("../../dbConnection.php");

header('Content-type: application/json');

	$subject_id = json_decode ($_POST['subject_id']);
	$image =  $_POST['bookImage'];
	$class_id = json_decode ($_POST['class_id']);
	$chapterName =  $_POST['chapterName'];
	$chapterNo = json_decode ($_POST['chapterNum']);
	$chapterFile = json_decode( $_POST['chapterFile']);

	
	$check = "SELECT class_id,subject_id from books where class_id=".$class_id."  AND subject_id=".$subject_id.";";
	$cquery = $conn->query($check);
	if($cquery->num_rows==0){

	$sql = "INSERT INTO books(subject_id,book_image,class_id) VALUES ('".$subject_id."','".$image."','".$class_id."');";
	$query = $conn->query($sql);
	$book_id = $conn->insert_id; 
			   
		
	$sql2 = "INSERT INTO chapter ( chapter_name, chapter_number, chapter_file, book_id) VALUES ('".$chapterName."','".$chapterNo."','".$chapterFile."' ,'".$book_id."');";
	$query2 = $conn->query($sql2);
	

	if($sql && $sql2){
		echo' 1';
	}else{
		echo "0 " ;
	}
	}else{

		echo" already exists";
	}

?>
 
