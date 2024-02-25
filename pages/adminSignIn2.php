<?php
    require_once("../include/config.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q = "SELECT * FROM admin WHERE username='$username'";
    $count = 0;
    $rs = mysqli_query($con, $q);

    while($row = mysqli_fetch_array($rs)){
        if($row['password'] == $password){
            $count++;
        }
    }

    if($count == 0){
        echo "<script>alert('Invalid username & password');</script>";
        echo "<script>window.location='./2adminSignIn.php'</script>";  
    }
    else{
        session_start();
        $_SESSION['k'] = $username;
        echo "<script>window.location='./adminDashboard.php'</script>";
    }
    
?>