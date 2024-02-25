<?php
    require_once("../include/config.php");
    $q1 = "SELECT * FROM election ";
    $rs = mysqli_query($con, $q1);
    $row = mysqli_fetch_assoc($rs);
    $status = $row['status'];
    if($status == 'active'){
        if (!isset($_SESSION['k'])) {
            echo "<script>window.location='./userSignIn.php'</script>";
        }
        $name = $_SESSION['k'];
        $q = "SELECT * FROM voter WHERE name='$name'";
        $rs = mysqli_query($con, $q);
        $row = mysqli_fetch_assoc($rs);
        $place = $row['place'];
        $q1 = "SELECT * FROM candidate WHERE place='$place'";
        $rs1 = mysqli_query($con, $q1);
        
        echo '
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">';
        while ($row = mysqli_fetch_assoc($rs1)) {
            $name = $row['name'];
            $photo = $row['party'];
            $voteNo = $row['voteNo'];
            $electionname = $row['electionname'];
            
            echo '
            <div class="col-xl-3 col-sm-6 mb-xl-4 mb-4">
                <div class="card h-100">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute p-1">
                            <img src="'.$photo.'" class="w-100 h-100 object-cover" alt="photo">
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">'.$electionname.'</p>
                            <h4 class="mb-0 text-capitalize">'.$name.'</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <span class="text-center text-sm font-weight-bolder">'.$voteNo.'</span>
                    </div>
                </div>
            </div>';
        }
        echo '
        </div>
    </div>
</main>';
    }
?>


<!-- <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($rs1)) {
                $name = $row['name'];
                $photo = $row['party'];
                $voteNo = $row['voteNo'];
                $electionname = $row['electionname'];
            ?>
            <div class="col-xl-3 col-sm-6 mb-xl-4 mb-4">
                <div class="card h-100">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute p-1">
                            <img src="<?php echo $photo; ?>" class="w-100 h-100 object-cover" alt="photo">
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize"><?php echo $electionname; ?></p>
                            <h4 class="mb-0 text-capitalize"><?php echo $name; ?></h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <span class="text-center text-sm font-weight-bolder"><?php echo $voteNo; ?></span>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</main> -->

<!-- <script>
    $(function () {
        setInterval(function () {
            $.post('chat_Reload.php', {}, function (result) {
                $("#x").html(result);
            });
        }, 100);
    });
</script> -->
