<?php
    define('TITLE','Dashboard');
    define('PAGE','dashboard');
    include('../mainInclude/header.php');
    if(!isset($_SESSION)){
        session_start();
    }

    // print_r($_SESSION);
?>




<?php  include('../mainInclude/footer.php'); ?>
