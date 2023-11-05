<?php
include("connection.php");
$id = $_GET['cat_id'];
$select_qualification_row = "SELECT * FROM `qualification` WHERE qualification_id = $id";
$run_select_qualification_row = mysqli_query($connection, $select_qualification_row);
$fetched_qualification_row = mysqli_fetch_array($run_select_qualification_row);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["btn_update_qualification"])) {
        $qualification_name = $_POST["qualification_name"];
        $status = $_POST["status"];
        $update_qualification = "UPDATE `qualification` SET `qualification_name`='$qualification_name', `status`='$status' WHERE qualification_id = $id";
        $run_update_qualification = mysqli_query($connection, $update_qualification);
        if ($run_update_qualification) {
            echo "<script> window.location.href = 'view_qualification.php' </script>";
        }
        ;
    }
    ;
}
;




?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'topbar.php'; ?>
                <div class="container">
                    <form method="POST">
                        <h1>Update Qualification</h1>
                        <div class="mb-3">
                            <label class="form-label">qualification</label>
                            <input type="text" value="<?php echo $fetched_qualification_row['qualification_name'] ?>" class="form-control"
                                name="qualification_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">status</label>
                            <input type="text" value="<?php echo $fetched_qualification_row['status'] ?>" class="form-control"
                                name="status">
                        </div>

                        <button type="submit" class="btn btn-primary" name="btn_update_qualification">Update qualification</button>
                    </form>
                </div>



            </div>
            <!-- End of Main Content -->

            <?php include 'footer.php'; ?>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>