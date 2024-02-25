<?php
    require_once("../include/config.php");

    if(isset($_POST['sign_in_btn'])){
      $name=$_POST['username'];
      $password=$_POST['password'];
      $q="select * from voter where name='$name'";
      $count=0;
      $rs=mysqli_query($con,$q);
      while($row=mysqli_fetch_array($rs)){
        if($row['mobno']==$password){
          $count++;
        }
      }
      if($count==0){
        echo"invalid username & password";
        echo"<script>window.location='./userSignIn.php'</script>";
      }
      else{
        session_start();
        $_SESSION['k']=$name;
        echo"<script>window.location='./userDashboard.php'</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>User Sign-In Page</title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign In</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="text-start" method="post">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" required>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"
                                            name="sign_in_btn">Sign In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
    <script src="../assets/js/core/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('button[name="sign_in_btn"]').click(function(e) {
            e.preventDefault(); // Prevent the form from submitting

            // Perform validation
            var username = $('#username').val();
            var password = $('#password').val();

            if (username.trim() == '') {
                alert('Please enter your username');
                return;
            }

            if (password.trim() == '') {
                alert('Please enter your password');
                return;
            }

            // If all validations pass, submit the form
            $('form').unbind('submit').submit();
        });
    });
</script>

</body>

</html>