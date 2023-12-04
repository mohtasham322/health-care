<?php
session_start();
include("../admin/connection.php");
$id = $_GET['id'];
$select_specialization = "SELECT * FROM doctors join specialization on doctors.doctor_specialization=specialization.specialization_id join city on doctors.doctor_city=city.city_id where doctors.doctor_id= '$id'";
$select_doctors = mysqli_query($connection, $select_specialization);
$select_doctors_data = mysqli_fetch_assoc($select_doctors);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["btn_sep_appointment"])) {
        if (isset($_SESSION['p_id'])) {
            $p_id = $_SESSION['p_id'];
            $p_gender = $_POST['p_gender'];
            $p_city = $select_doctors_data['city_id'];
            $date = $_POST['appointment_date'];
            $time = $_POST['appointment_time'];
            $d_id = $id;
            $p_age = $_POST['p_age'];
            $p_contact = $_POST['p_contact'];
            $appointment_insert = "INSERT INTO `appointment`(`patient_id`, `patient_gender`, `patient_city`, `date`, `time`, `doctor_id`, `patient_age`) VALUES ('$p_id','$p_gender','$p_city','$date','$time','$d_id','$p_age')";
            $run_appointment_insert = mysqli_query($connection, $appointment_insert);
            if ($run_appointment_insert) {
                echo "<script>alert('appointment request sent successfully')</script>";
            } else {
                echo "<script>alert('appointment request failed!')</script>";
            }
        }
        elseif(isset($_SESSION['d_id'])){
            echo "<script>alert('You are not allowed to make appointment from doctor account!')</script>";

        } else {
            echo "<script>alert('You are not logged in!')</script>";
        }

    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
                <h1 class="display-3 text-white animated zoomIn">Appointment</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Appointment</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">Why Choose Care?</h1>
                        <ol class="text-white mb-0">
                            <li><b>Convenience:</b> We value your time and convenience. Care simplifies the process of
                                finding and booking appointments with healthcare professionals, so you can focus on your
                                health, not paperwork.</li><br>
                            <li><b>Reliability:</b> We only list certified and trusted healthcare providers to ensure
                                your peace of mind. Your health is too important to leave to chance, and we're committed
                                to connecting you with the best in the industry.</li><br>
                            <li><b>Empowerment:</b> Care empowers you to take control of your healthcare journey. With
                                our platform, you can make informed decisions about your health and well-being.</li><br>
                            <li><b>Accessibility:</b>Our user-friendly website and mobile app ensure that you can access
                                our services anytime, anywhere. We're here to serve you 24/7.</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Make Appointment</h1>
                        <form method="POST">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Category"
                                        style="height: 55px;" readonly name="doctor"
                                        value="<?php echo $select_doctors_data['specialization_name'] ?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="city"
                                        style="height: 55px;" readonly name="patient_city"
                                        value="<?php echo $select_doctors_data['city_name'] ?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Doctor Name"
                                        style="height: 55px;" readonly name="doctor_name"
                                        value="<?php echo $select_doctors_data['doctor_name'] ?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name"
                                        style="height: 55px;" name="patient_name" value="">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;" name="p_gender">
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Custome">Custom</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" min="15" max="80" class="form-control bg-light border-0"
                                        placeholder="Your Age" name="p_age" style="height: 55px;">
                                </div>

                                <div class="col-3 col-sm-3">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option data-countryCode="PK" value="92" selected>+92</option>
                                    </select>
                                </div>
                                <div class="col-9 col-sm-9">
                                    <input type="text" class="form-control bg-light border-0"
                                        placeholder="Your Contact Number" name="p_contact" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <?php
                                        $minDate = date('Y-m-d');
                                        ?>
                                        <input type="date" class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Date"  name="appointment_date" min="<?php echo $minDate;
                                            ?>" style="height: 55px;" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time1" data-target-input="nearest">
                                        <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Time" data-target="#time1"
                                            data-toggle="datetimepicker" name="appointment_time" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit"
                                        name="btn_sep_appointment">Make Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


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