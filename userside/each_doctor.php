<?php
include("../admin/connection.php");
$id = $_GET['id'];
$select_doctors = "SELECT * FROM `doctors` where doctor_id = $id";
$run_select_doctors = mysqli_query($connection, $select_doctors);
$select_specialization = "SELECT * FROM `specialization`";
$run_select_specialization = mysqli_query($connection, $select_specialization);
$fetched_specialization = mysqli_fetch_assoc($run_select_specialization);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Care</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .section_heading {
            font-size: 70px;
            color: #06A3DA;
        }
        p{
            line-height: 30px;
        }
    </style>
</head>

<body>

    <?php include("spinner.php"); ?>
    <?php include("navbar.php"); ?>


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Doctors</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Doctors</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container justify-content-center">
            <div class="row g-5 mb-5">
                <div class="col-lg-12">
                    <div class="section-title mb-5">
                    </div>
                    <div class="row flex-row g-5">
                        <?php while ($row_doctors = mysqli_fetch_array($run_select_doctors)) { ?>
                            <div class="col-md-5 service-item wow zoomIn" data-wow-delay="0.6s">
                                <div class="rounded-top overflow-hidden">
                                    <img class="img-fluid" src="<?php echo $row_doctors['doctor_pic']; ?>" alt="">
                                </div>
                            </div>
                            <div class=" col-md-7  bg-light rounded-bottom text-left  p-4">
                                <h3 style="color:#06A3DA;">
                                    <?php echo $row_doctors['doctor_name']; ?>
                                </h3>
                                <?php
                                $specialization_id = $row_doctors['doctor_specialization'];
                                $select_specialization = "SELECT * FROM `specialization` where specialization_id = $specialization_id";
                                $run_select_specialization = mysqli_query($connection, $select_specialization);
                                $specialization_row = mysqli_fetch_array($run_select_specialization);

                                $qualification_id = $row_doctors['doctor_qualification'];
                                $select_qualification = "SELECT * FROM `qualification` where qualification_id = $qualification_id";
                                $run_select_qualification = mysqli_query($connection, $select_qualification);
                                $qualification_row = mysqli_fetch_array($run_select_qualification);

                                $city_id = $row_doctors['doctor_city'];
                                $select_city = "SELECT * FROM `city` where city_id = $city_id";
                                $run_select_city = mysqli_query($connection, $select_city);
                                $city_row = mysqli_fetch_array($run_select_city)
                                    ?>
                                <p class="m-0">
                                    <?php echo '<span><b>Specialization:</b></span>' .' '. $specialization_row['specialization_name']; ?>
                                </p>
                                <p class="m-0">
                                    <?php echo '<span><b>Experience:</b></span>' .' '. $row_doctors['doctor_exp'].' '. 'years'; ?>
                                </p>
                                <p class="m-0">
                                    <?php echo '<span><b>Qualification:</b></span>' .' '. $qualification_row['qualification_name']; ?>
                                </p>
                                <p class="m-0">
                                    <?php echo '<span><b>City:</b></span>' .' '. $city_row['city_name']; ?>
                                </p>
                                <p class="m-0 ">
                                    <?php echo '<span><b>Gender:</b></span>' .' '. $row_doctors['doctor_gender']; ?>
                                </p>
                                <button class="btn btn-dark py-2 text-right mt-2" width:50px;  name="btn_separate_appointment"><a href="separate_appointment.php?id=<?php echo $row_doctors['doctor_id'] ?> "> Make Appointment</a></button>
                                
                            </div>
                        <?php }
                        ; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
    <!-- Service End -->


    <?php
include('footer.php');
?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>