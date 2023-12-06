<?php
session_start();
// ob_start();
include("admin/connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_doctor_login'])) {
        $dl_email = $_POST['email'];
        $dl_password = $_POST['password'];

        $select_doctor = "SELECT * FROM `doctors` WHERE doctor_email = '$dl_email'";
        $run_select_doctor = mysqli_query($connection, $select_doctor);
        $fetched_doctor = mysqli_fetch_assoc($run_select_doctor);

        if ($dl_password == $fetched_doctor["doctor_password"]) {
            $_SESSION['d_id'] = $fetched_doctor['doctor_id'];
            $_SESSION['d_name'] = $fetched_doctor['doctor_name'];
            $_SESSION['d_email'] = $fetched_doctor['doctor_email'];
                echo "<script>window.location.href = 'index.php'</script>";
            } else {
            echo "<script>alert('Invalid email or password')</script>";
        }
    }
}
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
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Template Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="css/sign_up.css"> -->
    <script src="js/sign_up.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

        .form_div {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif !important;
        }


        section .container .user .formBx form h2 {
            font-size: 22px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-align: center;
            width: 100%;
            margin-bottom: 10px;
            color: #091e3e;
        }

        .input {
            position: relative;
            width: 100%;
            padding: 10px;
            background: #f5f5f5;
            color: #333;
            border: none;
            outline: none;
            box-shadow: none;
            margin: 8px 0;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: 300;
            margin-bottom: 30px !important;
        }

        select {
            position: relative;
            width: 100%;
            padding: 10px;
            background: #f5f5f5;
            color: #333;
            border: none;
            outline: none;
            box-shadow: none;
            margin: 8px 0;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: 300;
            margin-bottom: 30px !important;

        }

        input[type='submit'] {
            max-width: 100px;
            background: #091e3e;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
            transition: 0.5s;
        }

        input[type='submit']:hover {
            background: #06a3da;

        }


        section .container .user .formBx form .signup a {
            font-weight: 600;
            text-decoration: none;
            font-size: 13px;
            color: #06a3da;
            transition: all .3s;
        }

        section .container .user .formBx form .signup a:hover {
            text-decoration: underline;
            font-size: 13px;
            color: #091e3e;
        }

        .signup {
            position: relative;
            margin-top: 20px;
            font-size: 14px;
            letter-spacing: 1px;
            color: #555;
            text-transform: uppercase;
            font-weight: 300;
        }


        @media (max-width: 991px) {
            section .container {
                max-width: 400px;
            }
            section .container .user .formBx {
                width: 100%;
            }
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
                        <input type="text" class=" bg-transparent border-primary p-3" placeholder="Type search keyword">
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
                <h1 class="display-3 text-white animated zoomIn">Doctor Login</h1>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- registration form start -->
    <div class="container  form_div mt-3">
        <div class="user signinBx">
            <div>
                <form method="post" >
                    <div class="row justify-content-center jumbotron box8 ">
                        <div class="col-sm-8 form-group">
                            <label>Email</label>
                            <input class="input" type="email" name="email" placeholder="Enter your email.">
                        </div>
                        <div class="col-sm-8 form-group">
                            <label>Password</label>
                            <input class="input" type="Password" name="password" placeholder="Enter your password.">
                        </div>
                        <div class="col-sm-8 form-group mb-0">
                            <button class="btn btn-primary float-right" name="btn_doctor_login">Login</button>

                        </div>
                        <div class="col-sm-8">
                            <p class="signup">
                                Don't have an account ?
                                <a href="doctor_registration.php">Sign Up</a>
                            </p>
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </div>



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