<?php
    require_once("../include/config.php");
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $q="insert into admin values('$username','$email','$password')";
    $rs=mysqli_query($con,$q);
    if($rs){
        echo "<script>alert('Your account was successfully created');</script>";
        echo"<script>window.location='./2adminSignIn.php'</script>";
    }
    else{
        echo "<script>alert('error occurred');</script>";
        echo"<script>window.location = './1adminSignUp.php'</script>";
    }
    
?>