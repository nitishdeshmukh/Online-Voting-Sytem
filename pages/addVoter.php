<?php

    //if(isset($_POST['add_vot_btn'])){
        //require_once("../include/config.php");

        //$name = $_POST['name'];
        //$father_name = $_POST['fathername'];
        //$dob = $_POST['dob'];
        //$mobno = $_POST['mobno'];
        //$email = $_POST['email'];
        //$gender = $_POST['gender'];
        //$place = $_POST['place'];

        //$q="insert into voter values('$name','$father_name','$dob','$mobno','$email','$gender','$place',null) ";
        
        //$rs = mysqli_query($con, $q);
        
        //if($rs){
            //echo "<script>alert('voter successfully added');</script>";
            //echo "<script>window.location='adminDashboard.php?addVoterPage=1'</script>";
        //} else {
            //echo "<script>alert('Error occurred');</script>";
            //echo "<script>window.location='adminDashboard.php?addVoterPage=1'</script>";
        //}
    //}
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-11">
                <div class="card my-4 mx-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 text-center">Add Voter</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form method="post">
                            <div class="mb-3 mx-8">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter  name">
                            </div>
                            <div class="mb-3 mx-8">
                                <label for="fathername" class="form-label">Father Name</label>
                                <input type="text" class="form-control" id="fathername" name="fathername"
                                    placeholder="Enter father name">
                            </div>
                            <div class="mb-3 mx-8">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                            <div class="mb-3 mx-8">
                                <label for="mobno" class="form-label">Mobile No</label>
                                <input type="text" class="form-control" id="mobno" name="mobno"
                                    placeholder="Enter mobile no">
                            </div>
                            <div class="mb-3 mx-8">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email">
                            </div>
                            <div class="mb-3 mx-8">
                                <label class="form-label">Select Gender</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                        required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>

                            <div class="mb-3 mx-8">
                                <label for="place" class="form-label">Select Place</label>
                                <select class="form-select " id="place" name="place" required>
                                    <option value="place1">place1</option>
                                    <option value="place2">place2</option>
                                    <option value="place3">place3</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg bg-gradient-primary  mt-4 mb-0"
                                    name="add_vot_btn">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="../assets/js/core/jquery-3.5.1.min.js"></script>
<script>
$('button[type="submit"]').click(function(e) {
    e.preventDefault();

    var name = $('#name').val();
    var fatherName = $('#fathername').val();
    var dob = $('#dob').val();
    var mobno = $('#mobno').val();
    var email = $('#email').val();
    var gender = $('input[name="gender"]:checked').val();
    var place = $('#place').val();

    if (name.trim() == '') {
        alert('Please enter the full name');
        return;
    }

    if (fatherName.trim() == '') {
        alert('Please enter the father name');
        return;
    }

    if (dob.trim() == '') {
        alert('Please select the date of birth');
        return;
    }

    if (mobno.trim() == '') {
        alert('Please enter the mobile number');
        return;
    }

    if (!/^\d{10}$/.test(mobno.trim())) {
        alert('Please enter a valid 10-digit mobile number');
        return;
    }

    if (email.trim() == '') {
        alert('Please enter the email');
        return;
    }

    var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailFormat.test(email)) {
        alert('Please enter a valid email address');
        return;
    }

    if (!gender) {
        alert('Please select gender');
        return;
    }

    if (place == '') {
        alert('Please select the place');
        return;
    }

    $('form').off('submit').submit(); 
});
</script>