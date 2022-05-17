<?php

    if(!isset($_SESSION)){
        session_start();
    }

    include('../../dbConnection.php');

    // header('Content-type: application/json');

    $isUpdated = false;
        
    //to Update all the fields 
    if(isset( $_POST['subjectId'])){
        $sql = "UPDATE faculty_notes SET subject_id = '".$_POST['subjectId']."'
             WHERE fac_notes_id='".$_POST['note_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated=true;
        }
    }
    //to Update all the fields 
    if(isset( $_POST['studentId'])){
      $sql = "UPDATE faculty_notes SET student_id = '".$_POST['studentId']."'
           WHERE fac_notes_id='".$_POST['note_id']."'";
      $query = mysqli_query($conn,$sql);
      if($query){
          $isUpdated=true;
      }
  }

    if(isset( $_POST['chapterNum'])){
      $sql = "UPDATE faculty_notes SET chapter_no = '".$_POST['chapterNum']."'
           WHERE fac_notes_id='".$_POST['note_id']."'";
      $query = mysqli_query($conn,$sql);
      if($query){
          $isUpdated=true;
      }
    }
    if(isset( $_FILES['noteFile']) && isset( $_POST['prevFile'])){
      if(file_exists($_POST['prevFile'])){
        if(unlink($_POST['prevFile'])){
          //checking if there is reference to the assignment
          $valid_extensions = array( 'pdf'); // valid extensions
          $path = '../../fac_notes/'; // upload directory
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
              $sql = "UPDATE faculty_notes SET file_name = '".$path."'
                WHERE fac_notes_id='".$_POST['note_id']."'";
              $query = mysqli_query($conn,$sql);
              if($query){
                  $isUpdated=true;
              }
            }
          }
        }
      }
    }

    echo $isUpdated;


?>