<?php
// session_name("d_id");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Rest of your code

include("../admin/connection.php");
if (isset($_SESSION['p_id']) ) {
    $loginDropdownClass = "display-none";
    $loggedDoctorDropdownClass = "display-none";
    $loggedUserDropdownClass = "display-flex";
} 
elseif (isset($_SESSION['d_id'])) {
    // echo "session exist";
    $loginDropdownClass = "display-none";
    $loggedDoctorDropdownClass = "display-flex";
    $loggedUserDropdownClass = "display-none";
} 
else {
    $loginDropdownClass = "display-block";
    $loggedUserDropdownClass = "display-none";
    $loggedDoctorDropdownClass = "display-none";
}
?>

<!-- Navbar Start -->
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
    <link href="css/index.css" rel="stylesheet">
    <style>
        .profile_icon {
            width: 40px;

        }

        .display-none {
            display: none;
        }

        .display-flex {
            display: flex;
        }
    

             /* Navbar resposive */
           
    @media (max-width: 991px) {
        .navbar-collapse {
            justify-content: center;
        }

        .navbar-nav {
            margin-top: 10px;
            flex-direction: column;
            align-items: center;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .navbar-toggler {
            margin-bottom: 10px;
        }

        .logo_img {
            max-width: 140px; 
        }
    }

   
    @media (max-width: 360px) {
        .navbar {
            display: flex;
        }

        .logo_img {
            width: 80%; 
        }
    }



    </style>
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <img class="logo_img" src="img/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="service.php" class="nav-item nav-link">Service</a>
                <a href="doctors.php" class="nav-item nav-link">Doctors</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">Appointment</a>
                    <div class="dropdown-menu m-0">
                        <a href="view_appointment.php" class="dropdown-item">View appointment</a>
                        <a href="search_doctor.php" class="dropdown-item">Make appointment</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">Latest</a>
                    <div class="dropdown-menu m-0">
                        <a href="medical_news.php" class="dropdown-item">Medical News</a>
                        <a href="medical_inventions.php" class="dropdown-item">Medical Inventions</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <!-- <a href="appointment.html" class="btn btn-primary py-2 px-4 ms-3">Login</a> -->
            <div id="login_dropdown" style="position: relative;" class="<?php echo $loginDropdownClass; ?>">
                <a class="nav-link  btn btn-primary py-2 px-4 ms-3" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
                <div class="dropdown-menu m-0 mt-3">

                    <a class="dropdown-item" href="doctor_login.php">Login as a Doctor</a>
                    <a class="dropdown-item" href="sign_up.php">Login as a Patient</a>

                </div>
            </div>
            <div id="logged_user_dropdown" style="position: relative; width:120px;" class="<?php echo $loggedUserDropdownClass; ?> justify-content-center" >
                <a class="nav-link  py-2 px-3 ms-3" href="#" id="navbarDropdown1" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="profile_icon" src="../images/profile_icon.png" alt="">
                </a>
                <div class="dropdown-menu m-0 mt-3" id="login-dropdown1">
                    <p class="dropdown-item">
                        <?php echo $_SESSION['p_name']; ?>
                    </p>
                    <a class="dropdown-item" href="user_logout.php">Logout</a>

                </div>
            </div>
            <div id="logged_doctor_dropdown" style="position: relative; width:120px;"class="<?php echo $loggedDoctorDropdownClass; ?> justify-content-center">
                <a class="nav-link  py-2 px-3 ms-3" href="#" id="navbarDropdown2" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="profile_icon" src="../images/profile_icon.png" alt="">
                </a>
                <div class="dropdown-menu m-0 mt-3" id="login-dropdown2">
                    <p class="dropdown-item">
                    <?php echo $_SESSION['d_name']; ?><hr>
                    </p>
                    <a class="dropdown-item"
                        href="../doctor_panel/index.php?doc_id=<?php echo $_SESSION['d_id'] ?>">Dashboard</a>
                    <a class="dropdown-item" href="user_logout.php">Logout</a>

                </div>
            </div>

        </div>
    </nav>
</body>

</html>
<!-- Navbar End -->