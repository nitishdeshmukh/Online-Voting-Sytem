<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Sign-up Page</title>

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- CSS Files -->

    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet"/>


</head>

<body>
    <main class="main-content  mt-0">

        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-8 col-12 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder  text-center">Sign Up</h4>
                                    <p class="mb-0  text-center">Enter your email and password to register</p>
                                </div>
                                <div class="card-body">
                                    <form action="./adminSignUp2.php" role="form" method="post">
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control"
                                                required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                required>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="sign_up_btn">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="./2adminSignIn.php"
                                            class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
    <script src="../assets/js/core/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
        $('button[name="sign_up_btn"]').click(function(e) {
            e.preventDefault(); 

            
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();

            if (username.trim() == '') {
                alert('Please enter your username');
                return;
            }

            if (email.trim() == '') {
                alert('Please enter your email');
                return;
            }

            
            var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailFormat.test(email)) {
                alert('Please enter a valid email address');
                return;
            }

            if (password.trim() == '') {
                alert('Please enter your password');
                return;
            }

            
            $('form').submit();
        });
    });

    </script>
    
</body>

</html>