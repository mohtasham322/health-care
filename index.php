<?php
include("admin/connection.php");
$select_specialization = "SELECT * FROM `specialization` where status = 0";
$run_select_specialization = mysqli_query($connection, $select_specialization);
$select_city = "SELECT * FROM `city` where status = 0";
$run_select_city = mysqli_query($connection, $select_city);
$select_doctors = "SELECT * FROM `doctors` where status = 'Accepted'";
$run_select_doctors = mysqli_query($connection, $select_doctors);
$select_service = "SELECT * FROM `services` where status = 0";
$run_select_service = mysqli_query($connection, $select_service);



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
        .btn3 {
            width: 200px;
            padding-top: 15px !important;
            padding-bottom: 15px !important;
        }

        @media (max-width: 991px) {

            .banner_fhead {
                font-size: 25px !important;
            }

            .banner_shead {
                font-size: 35px !important;
            }
        }

        @media (max-width: 425px) {
            .banner_fhead {
                font-size: 13px !important;
            }

            .banner_shead {
                font-size: 24px !important;
            }
        }

        @media (max-width: 375px) {
            .banner_fhead {
                font-size: 10px !important;
            }

            .banner_shead {
                font-size: 20px !important;
            }

            .head_btn {
                width: 90px !important;
                font-size: 12px !important;
            }

            .appoint_btn {
                font-size: 14px !important;
            }

            .btn3 {
                width: 200px;
                padding-top: 15px !important;
                padding-bottom: 15px !important;
                margin-bottom: 10px !important;
            }
            .banner{
                margin-top: 15px !important;
            }
        }
    </style>

</head>

<body>

    <?php
    include "spinner.php";
    ?>
    <?php
    include "navbar.php";
    ?>

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











    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown banner_fhead">Prioritize Your
                                Wellness,
                                Treasure Your Health!</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn banner_shead">Take The Best Quality
                                Health
                                Treatment</h1>
                            <a href="search_doctor.php"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft head_btn">Appointment</a>
                            <a href="contact.php"
                                class="btn btn-secondary py-md-3 px-md-5 animated slideInRight head_btn">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown banner_fhead">Prioritize Your
                                Wellness,
                                Treasure Your Health!</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn banner_shead">Your Path to Health
                                and Wellness
                            </h1>
                            <a href="appointment.html"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft head_btn">Appointment</a>
                            <a href="contact.php"
                                class="btn btn-secondary py-md-3 px-md-5 animated slideInRight head_btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container ">
            <div class="row justify-content-center align-items-center gx-0">
                <div class="col-lg-8 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-dark d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Search A Doctor</h3>
                        <form method="post" action="doctors.php">
                            <select class="form-select bg-light border-0 mb-3" style="height: 40px;"
                                name="s_specialization">
                                <?php
                                $rows = array();
                                while ($specialization_row = mysqli_fetch_array($run_select_specialization)) {
                                    $rows[] = $specialization_row;
                                    ; ?>
                                    <option value="<?php echo $specialization_row['specialization_id']; ?>">
                                        <?php echo $specialization_row['specialization_name'] ?>
                                    </option>
                                <?php }
                                ; ?>
                            </select>

                            <select class="form-select bg-light border-0 mb-3" style="height: 40px;" name="s_city">
                                <?php
                                $rows_city = array();
                                while ($city_row = mysqli_fetch_array($run_select_city)) {
                                    $rows_city[] = $city_row;
                                    ; ?>
                                    <option value="<?php echo $city_row['city_id']; ?>">
                                        <?php echo $city_row['city_name'] ?>
                                    </option>
                                <?php }
                                ; ?>
                            </select>
                            <button type="submit" name="btn_search_doctor" class="btn btn-primary w-100">Search
                                Doctor</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Banner Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">About Care</h5>
                        <h1 class="display-5 mb-0">The World's Best Health Care Site That You Can Trust</h1>
                    </div>
                    <p class="mb-4">Welcome to Care, your trusted companion in finding the right healthcare
                        professional
                        and managing your appointments, no matter where you are. At Care, we understand that
                        your health
                        is your most precious asset, and we're here to make it easy for you to access top-notch
                        medical
                        expertise in your city.</p>
                </div>
                <div class="col-lg-5" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- About End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10 py-5">
                    <div class="">
                        <h1 class="display-5 mb-5 text-white">Why Choose Care?</h1>
                        <ol class="text-white mb-0">
                            <li><b>Convenience:</b> We value your time and convenience. Care simplifies the process
                                of
                                finding and booking appointments with healthcare professionals, so you can focus on
                                your
                                health, not paperwork.</li><br>
                            <li><b>Reliability:</b> We only list certified and trusted healthcare providers to
                                ensure
                                your peace of mind. Your health is too important to leave to chance, and we're
                                committed
                                to connecting you with the best in the industry.</li><br>
                            <li><b>Empowerment:</b> Care empowers you to take control of your healthcare journey.
                                With
                                our platform, you can make informed decisions about your health and well-being.</li>
                            <br>
                            <li><b>Accessibility:</b>Our user-friendly website and mobile app ensure that you can
                                access
                                our services anytime, anywhere. We're here to serve you 24/7.</li>
                        </ol>
                    </div>

                </div>
                <div class="col-6">
                    <a href="search_doctor.php" class="btn btn-primary w-100 mb-5 py-3 appoint_btn" type="submit">Make
                        Appointment</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                    <div class=" position-relative h-100">
                        <img class=" w-100 h-100"
                            src="https://img.freepik.com/free-photo/attractive-female-doctor-standing-with-documents-hospital_1303-20688.jpg"
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7 justify-content-center align-self-center">
                    <div class="section-title mb-5 ">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Services</h5>
                        <h1 class="display-5 mb-0">We Offer The Best Quality Health Services</h1>
                    </div>
                </div>
            </div>
            <div class="row g-5 d-flex justify-content-center align-items-center">
                <?php while ($row_service = mysqli_fetch_array($run_select_service)) {
                    ?>
                    <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                        <div class="rounded-top overflow-hidden">
                            <img class="img-fluid w-100" src="<?php echo $row_service['image']; ?>" alt=""
                                style="object-fit: cover; height: 240px;">
                        </div>
                        <div class="position-relative bg-light rounded-bottom text-center p-4">
                            <h5 class="m-0">
                                <?php echo $row_service['service_name']; ?>
                            </h5>
                        </div>
                    </div>

                <?php }
                ; ?>

            </div>
        </div>
    </div>

    <!-- Service End -->


    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 wow zoomIn" data-wow-delay="0.6s">
                    <div class="offer-text text-center rounded p-5">
                        <h1 class="display-5 text-white">Health Unleashed: Your Wellness Hub Online.</h1>
                        <p class="text-white mb-4">Care was founded with a simple yet powerful mission: to connect
                            individuals with the
                            best healthcare services available. We believe that everyone deserves convenient access
                            to a
                            network of skilled doctors and specialists........</p>
                        <a href="search_doctor.php" class="btn btn-dark  btn3">Appointment</a>
                        <a href="about.php" class="btn btn-light  btn3">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->




    <!-- Testimonial Start -->
    <div class="container-fluid bg-primary bg-testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn" data-wow-delay="0.6s">
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-1.jpg" alt="">
                            <p class="fs-5">Dolores sed duo clita justo dolor et stet lorem kasd dolore lorem ipsum.
                                At
                                lorem lorem magna ut et, nonumy labore diam erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Client Name</h4>
                        </div>
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-2.jpg" alt="">
                            <p class="fs-5">Dolores sed duo clita justo dolor et stet lorem kasd dolore lorem ipsum.
                                At
                                lorem lorem magna ut et, nonumy labore diam erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Client Name</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->




    <?php
    include 'footer.php';
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