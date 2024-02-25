    <?php
        require_once("../include/config.php");
        
        if(isset($_SESSION['k']) == false){
            echo "<script>window.location='./1adminSignUp.php'</script>";
            echo"error";
        }
        $username = $_SESSION['k'];
        $q = "select * from admin where username='$username'";
        $rs = mysqli_query($con, $q);
        while($row = mysqli_fetch_array($rs)){
            $email = $row['email'];
            $password = $row['password'];
        }
    ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " id="main-container">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-11">
                    <div class="card my-4 mx-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3 text-center">Profile Details</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2 mx-5">
                                <table class="table table-light-dark">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><label for="username"
                                                    class="form-label fw-bold text-lg">Username</label></th>
                                            <td>
                                                <input type="text" id="username" name="username"
                                                    class="form-control fw-bold text-lg"
                                                    value="<?php echo $username; ?>" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><label for="email"
                                                    class="form-label fw-bold text-lg">Email</label></th>
                                            <td>
                                                <input type="text" id="email" name="email"
                                                    class="form-control fw-bold text-lg" value="<?php echo $email; ?>"
                                                    required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><label for="password"
                                                    class="form-label fw-bold text-lg">Password</label></th>
                                            <td>
                                                <input type="text" id="password" name="password"
                                                    class="form-control fw-bold text-lg"
                                                    value="<?php echo $password; ?>" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg  mt-4 mb-0"><a class="text-white" onclick="updateProfile()">Update Profile</a></button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<script>
    $(document).ready(function() {
        $('button[type="submit"]').click(function(e) {
            e.preventDefault(); // Prevent the form from submitting

            // Perform validation
            var email = $('#email').val();
            var password = $('#password').val();

            if (email.trim() == '') {
                alert('Please enter your email');
                return;
            }

            // Basic email format validation
            var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailFormat.test(email)) {
                alert('Please enter a valid email address');
                return;
            }

            if (password.trim() == '') {
                alert('Please enter your password');
                return;
            }

            // If all validations pass, update the profile
            updateProfile();
        });
    });

    var updateProfile = () => {
        $.post('adminProfileUpdate.php', {k1: $("#password").val(), k2: $("#email").val()}, function(result) {
            alert(result);
        });
    }
</script>
