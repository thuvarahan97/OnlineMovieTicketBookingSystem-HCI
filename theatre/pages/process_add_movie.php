<?php
    session_start();
    include('../../config.php');
    extract($_POST);
    
    // Poster
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    $flname="images/".basename($_FILES["image"]["name"]);

    // Banner
    $target_dir2 = "../../images/banners";
    $target_file2 = $target_dir2 . basename($_FILES["banner"]["name"]);
    
    $flname2="images/".basename($_FILES["banner"]["name"]);
    
    
    mysqli_query($con,"insert into  tbl_movie values(NULL,'".$_SESSION['theatre']."','$name','$cast','$desc','$rdate','$flname', '$flname2', '$video','0')");
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $_SESSION['success']="Movie Added";
    header('location:add_movie.php');
?>