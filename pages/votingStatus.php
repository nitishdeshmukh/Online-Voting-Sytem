<?php
    require_once("../include/config.php");
    if (!isset($_SESSION['k'])) {
        echo "<script>window.location='./2adminSignIn.php'</script>";
    }
    $q1 = "SELECT * FROM candidate";
    $rs1 = mysqli_query($con, $q1);
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($rs1)) {
                $name = $row['name'];
                $photo = $row['party'];
                $voteNo = $row['voteNo'];
                $electionname = $row['electionname'];
                $place = $row['place'];
            ?>
            <div class="col-xl-3 col-sm-6 mb-xl-4 mb-4">
                <div class="card h-100">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <img src="<?php echo $photo; ?>" class="w-100" alt="photo">
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize"><?php echo $electionname; ?></p>
                            <h4 class="mb-0 text-capitalize"><?php echo $name; ?></h4>
                            <p class="text-sm mb-0 text-capitalize"><?php echo $place; ?></p>
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
</main>

