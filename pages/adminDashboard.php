<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Dashboard Page</title>

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/c0ab1ec977.js" crossorigin="anonymous"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <style>
    th {
        vertical-align: middle;
    }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header justify-content-center align-items-center px-3 py-4">
            <span class="ms-1 font-weight-bold text-white text-al d-block  text-center">Admin Dashboard</span>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="./adminDashboard.php?adminProfilePage=1">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user fa-lg"></i>
                        </div>

                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="./adminDashboard.php?addVoterPage=1">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user-plus fa-lg"></i>
                        </div>

                        <span class="nav-link-text ms-1">Add Voters</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="./adminDashboard.php?addCandidatePage=1">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user-plus fa-lg"></i>
                        </div>

                        <span class="nav-link-text ms-1">Add Candidate</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="./adminDashboard.php?electionSchedulePage=1">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-chart-simple fa-lg"></i>
                        </div>

                        <span class="nav-link-text ms-1">Election Schedule</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="./adminDashboard.php?votingStatusPage=1">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-signal fa-lg"></i>
                        </div>

                        <span class="nav-link-text ms-1">Voting Status</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="./adminLogout.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                        </div>

                        <span class="nav-link-text ms-1">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <?php
    if(isset($_GET['adminProfilePage'])){
      require_once("./adminProfile.php");
    }
    elseif(isset($_GET['addVoterPage'])){
      require_once("./addVoter.php");
    }
    elseif(isset($_GET['addCandidatePage'])){
      require_once("./addCandidate.php");
    }
    elseif(isset($_GET['electionSchedulePage'])){
      require_once("./electionSchedule.php");
    }
    elseif(isset($_GET['votingStatusPage'])){
      require_once("./votingStatus.php");
    }
  ?>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>