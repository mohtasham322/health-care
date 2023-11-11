<?php
include("../admin/connection.php");
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











    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Prioritize Your Wellness,
                                Treasure Your Health!</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Take The Best Quality Health
                                Treatment</h1>
                            <a href="appointment.php"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                            <a href="contact_us.php" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Prioritize Your Wellness,
                                Treasure Your Health!</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Your Path to Health and Wellness
                            </h1>
                            <a href="appointment.html"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
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
                        <select class="form-select bg-light border-0 mb-3" style="height: 40px;" name="s_specialization">
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
                        <button type="submit" name="btn_search_doctor" class="btn btn-primary w-100">Search Doctor</a>
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
                    <p class="mb-4">Welcome to Care, your trusted companion in finding the right healthcare professional
                        and managing your appointments, no matter where you are. At Care, we understand that your health
                        is your most precious asset, and we're here to make it easy for you to access top-notch medical
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
    </div>
    <!-- About End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">Why Choose Care?</h1>
                        <ol class="text-white mb-0">
                        <li><b>Convenience:</b> We value your time and convenience. Care simplifies the process of finding and booking appointments with healthcare professionals, so you can focus on your health, not paperwork.</li><br>
                        <li><b>Reliability:</b>  We only list certified and trusted healthcare providers to ensure your peace of mind. Your health is too important to leave to chance, and we're committed to connecting you with the best in the industry.</li><br>
                        <li><b>Empowerment:</b> Care empowers you to take control of your healthcare journey. With our platform, you can make informed decisions about your health and well-being.</li><br>
                        <li><b>Accessibility:</b>Our user-friendly website and mobile app ensure that you can access our services anytime, anywhere. We're here to serve you 24/7.</li>
                    </ol>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Make Appointment</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <?php
                                        foreach ($rows as $specialization_row) { ?>
                                            <option value="<?php echo $specialization_row['specialization_id']; ?>">
                                                <?php echo $specialization_row['specialization_name'] ?>
                                            </option>
                                        <?php }
                                        ; ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <?php while ($doctors_row = mysqli_fetch_array($run_select_doctors)) {
                                            ; ?>
                                            <option value="<?php echo $doctors_row['doctor_id']; ?>">
                                                <?php echo $doctors_row['doctor_name'] ?>
                                            </option>
                                        <?php }
                                        ; ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Custome">Custom</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" min="15" class="form-control bg-light border-0"
                                        placeholder="Your Age" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <?php
                                        foreach ($rows_city as $city_row) { ?>
                                            <option value="<?php echo $city_row['city_id']; ?>">
                                                <?php echo $city_row['city_name'] ?>
                                            </option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-3 col-sm-3">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option data-countryCode="PK" value="92" selected>+92</option>
                                    </select>
                                </div>
                                <div class="col-9 col-sm-9">
                                    <input type="text" class="form-control bg-light border-0"
                                        placeholder="Your Contact Number" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Date" data-target="#date1"
                                            data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time1" data-target-input="nearest">
                                        <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Time" data-target="#time1"
                                            data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Make Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                <div class="row g-5">
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
    </div>
    <!-- Service End -->


    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 wow zoomIn" data-wow-delay="0.6s">
                    <div class="offer-text text-center rounded p-5">
                        <h1 class="display-5 text-white">Health Unleashed: Your Wellness Hub Online.</h1>
                        <p class="text-white mb-4">Care was founded with a simple yet powerful mission: to connect individuals with the
                        best healthcare services available. We believe that everyone deserves convenient access to a
                        network of skilled doctors and specialists........</p>
                        <a href="appointment.html" class="btn btn-dark py-3 px-5 me-3">Appointment</a>
                        <a href="about.php" class="btn btn-light py-3 px-5">Read More</a>
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
                            <p class="fs-5">Dolores sed duo clita justo dolor et stet lorem kasd dolore lorem ipsum. At
                                lorem lorem magna ut et, nonumy labore diam erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Client Name</h4>
                        </div>
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-2.jpg" alt="">
                            <p class="fs-5">Dolores sed duo clita justo dolor et stet lorem kasd dolore lorem ipsum. At
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




    <!-- Newsletter Start -->
    <div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <div class="container">
            <div class="bg-primary p-5">
                <form class="mx-auto" style="max-width: 600px;">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                        <button class="btn btn-dark px-4">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
        <div class="container pt-5">
            <div class="row g-5 pt-4">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About
                            Us</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                            Services</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest
                            Blog</a>
                        <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Popular Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About
                            Us</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                            Services</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest
                            Blog</a>
                        <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>info@example.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Follow Us</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i
                                class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i
                                class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i
                                class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i
                                class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-light py-4" style="background: #051225;">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">Your Site Name</a>. All
                        Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">HTML
                            Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


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