<?php
    require_once("../include/config.php");
    if (!isset($_SESSION['k'])) {
        echo "<script>window.location='./userSignIn.php'</script>";
    }
    $name = $_SESSION['k'];
    $q = "SELECT * FROM voter WHERE name='$name'";
    $rs = mysqli_query($con, $q);
    $row = mysqli_fetch_assoc($rs);
    $place = $row['place'];
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" id ="main-container">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-11">
                <div class="card my-4 mx-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3 text-center">Submit Vote</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <?php
                            $q1 = "SELECT * FROM candidate WHERE place='$place'";
                            $rs1 = mysqli_query($con, $q1);
                        ?>
                        <table class="table table-primary table-hover">
                            <tbody>
                                <?php
                                    while ($row = mysqli_fetch_assoc($rs1)) {
                                        $candidate = $row['name'];
                                        $photo = $row['party']; 
                                ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $photo; ?>" class="w-10" alt="photo">
                                    </td>
                                    <td>
                                        <div class="">
                                            <strong class="text-capitalize"><?php echo $candidate; ?></strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <button type="button" class="btn btn-lg bg-gradient-primary btn-lg"  onclick="castVote('<?php echo $candidate; ?>')">Vote</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
var castVote = (candidate) => {
    $.post('voteInsert.php', {
        k1: candidate
    }, function(result) {
        alert(result);
    });
}
</script>
