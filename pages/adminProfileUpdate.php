<?php
    session_start();
    require_once("../include/config.php");
    $username = $_SESSION['k'];
    $password = $_POST['k1'];
    $email = $_POST['k2'];
    $q = "update admin set email ='$email', password ='$password'  where username='$username'";
    $rs = mysqli_query($con, $q);
    if($rs){
        echo "updated successfully";
    }
    else{
        echo "error";
        
    }
?>