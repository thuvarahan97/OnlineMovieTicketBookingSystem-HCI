<?php
    session_start();
    include('../../config.php');
    extract($_POST);
    
    $target_dir = "../../images/banners/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    $flname="images/banners/".basename($_FILES["image"]["name"]);
    
    mysqli_query($con,"insert into tbl_banners values(NULL,'$movie_id','$flname')");
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success']="Banner Added";
    header('location:add_banner.php');
?>