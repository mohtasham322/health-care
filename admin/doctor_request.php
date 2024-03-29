<?php
include("connection.php");
$select_doctor_query = "SELECT * FROM `doctors` where status = ' ' ";
$run_select_doctor_query = mysqli_query($connection, $select_doctor_query);


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        td{
            padding: 20px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php';?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'topbar.php';?>
                <div class="container" style="overflow-x: auto;">
                    
                        <h1>Doctor Registration Request </h1>
                        <table class="table-bordered w-100 text-center w-100" >
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Profile Pic</th>
                                <th>Exp</th>
                                <th>Qualification</th>
                                <th>Phone</th>
                                <th>Degree</th>
                                <th>NIC front</th>
                                <th>NIC back</th>
                                <th>City</th>
                                <th>Whatsapp</th>
                                <th>Gender</th>
                                <th>Specialization</th>
                                <th>Status</th>
                                <th>Accept</th>
                                <th>Decline</th>
                            </thead>
                            <tbody>
                                <?php while($row_doctor = mysqli_fetch_array($run_select_doctor_query)){?>
                              <tr>
                                        <td><?php echo $row_doctor['doctor_id']; ?></td>
                                        <td><?php echo $row_doctor['doctor_name']; ?></td>
                                        <td><?php echo $row_doctor['doctor_email']; ?></td>
                                        <td><img width="50" src="<?php echo $row_doctor['doctor_pic']; ?>" alt=""></td>
                                        <td><?php echo $row_doctor['doctor_exp']; ?></td>
                                        <td><?php echo $row_doctor['doctor_qualification']; ?></td>
                                        <td><?php echo $row_doctor['doctor_contact']; ?></td>
                                        <td><img width="50" src="<?php echo $row_doctor['doctor_degree_pic']; ?>" alt=""></td>
                                        <td><img width="50" src="<?php echo $row_doctor['doctor_nic_front_pic']; ?>" alt=""></td>
                                        <td><img width="50" src="<?php echo $row_doctor['doctor_nic_back_pic']; ?>" alt=""></td>
                                        <td><?php echo $row_doctor['doctor_city']; ?></td>
                                        <td><?php echo $row_doctor['doctor_whatsapp']; ?></td>
                                        <td><?php echo $row_doctor['doctor_gender']; ?></td>
                                        <td><?php echo $row_doctor['doctor_specialization']; ?></td>
                                        <td><?php echo $row_doctor['status']; ?></td>
                                        <td><a href="accept_request.php?d_id=<?php echo $row_doctor['doctor_id']; ?>" class="btn btn-primary">Accept</a></td>
                                        <td><a href="decline_request.php?d_id=<?php echo $row_doctor['doctor_id']; ?>" class="btn btn-danger">Decline</a></td>
                              </tr>
                                <?php } ?>
                                
                            </tbody>
                            
                        </table>

                
                </div>



            </div>
            <!-- End of Main Content -->

            <?php include 'footer.php' ?>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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