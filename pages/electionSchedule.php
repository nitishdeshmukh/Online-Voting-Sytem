<?php
    require_once("../include/config.php");

    if(isset($_POST['place'])){
        $place = $_POST['place'];
        $q = "SELECT * FROM candidate WHERE place='$place'";
        $rs = mysqli_query($con, $q);
        $candidates = array();
        while($row = mysqli_fetch_array($rs)){
            $candidates[] = $row['name'];
        }
    }
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-11">
                <div class="card my-4 mx-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 text-center">Schedule Election</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form method="post">
                            <div class="mb-3 mx-8">
                                <label for="electionname" class="form-label">Name of Election</label>
                                <input type="text" class="form-control" id="electionname" name="electionname"
                                    placeholder="Enter election name">
                            </div>
                            <div class="mb-3 mx-8">
                                <label for="startingdate" class="form-label">Starting Date</label>
                                <input type="date" class="form-control" id="startingdate" name="startingdate">
                            </div>
                            <div class="mb-3 mx-8">
                                <label for="endingdate" class="form-label">Ending Date</label>
                                <input type="date" class="form-control" id="endingdate" name="endingdate">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg bg-gradient-primary" name="ok">Schedule
                                    Election</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('button[name="ok"]').click(function(e) {
            e.preventDefault(); // Prevent the form from submitting

            // Perform validation
            var electionname = $('#electionname').val();
            var startingdate = $('#startingdate').val();
            var endingdate = $('#endingdate').val();

            if (electionname.trim() == '') {
                alert('Please enter the name of the election');
                return;
            }

            if (startingdate.trim() == '') {
                alert('Please select the starting date');
                return;
            }

            if (endingdate.trim() == '') {
                alert('Please select the ending date');
                return;
            }

            // If all validations pass, submit the form
            $('form').unbind('submit').submit();
        });
    });
</script>


<?php
    require_once("../include/config.php");
    if(isset($_POST['ok'])){
        $currentdate = new DateTime(); 
        $electionname = $_POST['electionname'];
        $startingdate = $_POST['startingdate'];
        $endingdate = $_POST['endingdate'];
        $startdate = new DateTime($startingdate); 
        $enddate = new DateTime($endingdate); 
        $diff = $currentdate->diff($enddate); 

        if($diff->format("%R%a") != 0){
            $status = "inactive";
        } else {
            $status = "active";
        }

        $q = "INSERT INTO election VALUES ('$electionname', '$startingdate', '$endingdate', '$status')";
        $rs = mysqli_query($con, $q);

        if($rs){
            echo "<script>alert('successfully saved');</script>";
        } else {
            echo "<script>alert('Error occurred');</script>";
        }
    }
?>
