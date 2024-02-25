<?php
    require_once("../include/config.php");
    session_start();
    $name = $_SESSION['k'];
    $q = "SELECT * FROM voter WHERE name='$name'";
    $rs = mysqli_query($con, $q);
    $row = mysqli_fetch_assoc($rs);
    $vote = $row['votingStatus'];
    if ($vote == 1) {
        echo "You have already voted";
    } 
    else {
        $vote = 1;
        $q1="UPDATE voter SET votingStatus=$vote WHERE name='$name'";
        $rs = mysqli_query($con, $q1);
        if($rs){
            echo "You have successfully voted";
            $canname=$_POST['k1'];
            $q3 = "SELECT * FROM candidate WHERE name='$canname'";
            $rs = mysqli_query($con, $q3);
            $row = mysqli_fetch_assoc($rs);
            $voteNo = $row['voteNo'];
            if($voteNo>=0){
                $voteNo=$voteNo+1;
                $q4="UPDATE candidate SET voteNo=$voteNo WHERE name='$canname'";
                $rs = mysqli_query($con, $q4);
            }
        }
    }
?>