<?php
    require_once("../include/config.php");
    if(!isset($_SESSION['k'])) {
        echo "<script>window.location='./userSignIn.php'</script>"; 
    }
    $name = $_SESSION['k'];
    $q = "SELECT * FROM voter WHERE name='$name'";
    $rs = mysqli_query($con, $q);
    while($row = mysqli_fetch_array($rs)) {
        $fathername = $row['fathername']; 
        $dob = $row['dob']; 
        $mobno = $row['mobno'];
        $email = $row['email'];
        $gender = $row['gender'];
        $place = $row['place']; 
    }
?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-11">
                    <div class="card my-4 mx-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3 text-center">Profile Details</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <table class="table table-primary table-hover">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>
                                            <?php echo $name; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Father Name</th>
                                        <td>
                                            <?php echo $fathername; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Date of Birth</th>
                                        <td>
                                            <?php echo $dob; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mobile No(Password)</th>
                                        <td>
                                            <?php echo $mobno; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>
                                            <?php echo $email; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gender</th>
                                        <td>
                                            <?php echo $gender; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Place</th>
                                        <td>
                                            <?php echo $place; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
