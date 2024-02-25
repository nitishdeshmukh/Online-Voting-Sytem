<?php
        //require_once("../include/config.php");
        //if(isset($_POST['add_can_btn'])){
        //$n=$_FILES['photo']['name'];
        //$tn=$_FILES['photo']['tmp_name'];
        //$name = $_POST['name'];
        //$father_name = $_POST['fathername'];
        //$election_name =$_POST['election-name'];
        //$dob = $_POST['dob'];
        //$mobno = $_POST['mobno'];
        //$gender = $_POST['gender'];
        //$email = $_POST['email'];
        //$place = $_POST['place'];
        //if(move_uploaded_file($tn,$n)){
            //$q="insert into candidate values ('$name','$father_name','$n','$election_name','$dob','$mobno','$gender','$email','$place','null')"; 
            //$rs = mysqli_query($con, $q);
        
           // if($rs){
               // echo "<script>alert('Candidate successfully added');</script>";
                //echo "<script>window.location='./adminDashboard.php?addCandidatePage=1'</script>";
            //} else {
               // echo "<script>alert('Error occurred');</script>";
                //echo "<script>window.location='./adminDashboard.php?addCandidatePage=1'</script>";  
           // }
        //} else {
            //echo "<script>alert('Failed to upload party image');</script>";
            //echo "<script>window.location='./adminDashboard.php?addCandidatePage=1'</script>";
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
                            <h6 class="text-white text-capitalize ps-3 text-center">Add Candidate</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form id="form" method="post" enctype="multipart/form-data">
                            <div class="mb-3 mx-8">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                    required>
                            </div>
                            <div class="mb-3 mx-8 ">
                                <label for="father-name" class="form-label">Father Name</label>
                                <input type="text" class="form-control" id="fathername" placeholder="Enter father name"
                                    name="fathername">
                            </div>
                            <div class="mb-3 mx-8">
                                <label class="form-label">Party</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            <div class="mb-3 mx-8 ">
                                <label for="election-name" class="form-label">Election Name</label>
                                <input type="text" class="form-control" id="election-name"
                                    placeholder="Enter election name" name="election-name">
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
                            <div class="mb-3 mx-8 ">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email">
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
                                <button type="submit" class="btn btn-lg bg-gradient-primary mt-4 mb-0 text-white"
                                    name="add_can_btn">Add</button>
                            </div>
                        </form>
                    </div>
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
    var photo = $('#photo')[0].files[0];
    var electionName = $('#election-name').val();
    var dob = $('#dob').val();
    var mobno = $('#mobno').val();
    var gender = $('input[name="gender"]:checked').val();
    var email = $('#email').val();
    var place = $('#place').val();

    if (name.trim() === '') {
        alert('Please enter the name');
        return;
    }

    if (electionName.trim() === '') {
        alert('Please enter the election name');
        return;
    }

    if (dob.trim() === '') {
        alert('Please select the date of birth');
        return;
    }

    if (mobno.trim() === '') {
        alert('Please enter the mobile number');
        return;
    }

    if (!gender) {
        alert('Please select gender');
        return;
    }

    if (email.trim() === '') {
        alert('Please enter the email');
        return;
    }

    var emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailFormat.test(email)) {
        alert('Please enter a valid email address');
        return;
    }

    if (place === '') {
        alert('Please select the place');
        return;
    }

    if (!photo) {
        alert('Please select a photo');
        return;
    }

    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if (!allowedExtensions.exec(photo.name)) {
        alert('Invalid file format. Please upload a JPEG, JPG, or PNG file.');
        return;
    }

    $('form').unbind('submit').submit();
});
</script>
