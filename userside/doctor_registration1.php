<?php
include("../admin/connection.php");
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require '../PHPMailer-master/autoload.php'; // Path to the Composer autoload file
$select_qualification = "SELECT * FROM `qualification` where status = 0";
$run_select_qualification = mysqli_query($connection, $select_qualification);
$select_specialization = "SELECT * FROM `specialization` where status = 0";
$run_select_specialization = mysqli_query($connection, $select_specialization);
$select_city = "SELECT * FROM `city` where status = 0";
$run_select_city = mysqli_query($connection, $select_city);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["btn_register"])) {
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $full_name = $f_name . ' ' . $l_name;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $p_image = $_FILES['p_image'];
        $p_image_name = $_FILES['p_image']['name'];
        $p_image_temp_name = $_FILES['p_image']['tmp_name'];
        $p_image_path = "../doctors_images/" . $p_image_name;
        move_uploaded_file($p_image_temp_name, $p_image_path);
        $experience = $_POST['experience'];
        $qualification = $_POST['qualification'];
        $specialization = $_POST['specialization'];
        $city = $_POST['city'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $whatsapp = $_POST['whatsapp'];
        $deg_image = $_FILES['deg_pic'];
        $deg_image_name = $_FILES['deg_pic']['name'];
        $deg_image_tmp_name = $_FILES['deg_pic']['tmp_name'];
        $deg_image_path = "../degree_images/" . $deg_image_name;
        move_uploaded_file($deg_image_tmp_name, $deg_image_path);
        $nic_front_image = $_FILES['nic_front_pic'];
        $nic_front_image_name = $_FILES['nic_front_pic']['name'];
        $nic_front_image_tmp_name = $_FILES['nic_front_pic']['tmp_name'];
        $nic_front_image_path = "../nic_images/" . $nic_front_image_name;
        move_uploaded_file($nic_front_image_tmp_name, $nic_front_image_path);
        $nic_back_image = $_FILES['nic_back_pic'];
        $nic_back_image_name = $_FILES['nic_back_pic']['name'];
        $nic_back_image_tmp_name = $_FILES['nic_back_pic']['tmp_name'];
        $nic_back_image_path = "../nic_images/" . $nic_back_image_name;
        move_uploaded_file($nic_back_image_tmp_name, $nic_back_image_path);
        $insert_doctor_query = "INSERT INTO `doctors`(`doctor_name`, `doctor_email`, `doctor_password`, `doctor_pic`, `doctor_exp`, `doctor_qualification`, `doctor_contact`, `doctor_degree_pic`, `doctor_nic_front_pic`, `doctor_nic_back_pic`, `doctor_city`, `doctor_whatsapp`, `doctor_gender`, `doctor_specialization`) VALUES ('$full_name','$email','$password ','$p_image_path','$experience','$qualification','$phone','$deg_image_path','$nic_front_image_path','$nic_back_image_path','$city','$whatsapp','$gender','$specialization')";
        $run_insert_doctor_query = mysqli_query($connection, $insert_doctor_query);

        // $subject = "registration request on care website";
        // $txt = "Your registration request has been sent successfully and you will be responded within 24 working hours";
        // $mail = new PHPMailer();
        // $mail-> isSMTP();
        // $mail-> Host = 'SMTP.gmail.com';
        // $mail-> SMTPauth = true;
        // $mail-> Username = 'mmhashmi322@gmail.com';
        // $mail-> Password = '';
        // $mail-> SMTPSecure = 'tls';
        // $mail-> Port = 587;
        // $mail-> setfrom("mmhashmi322@gmail.com");
        // $mail-> addAddress($email);
        // $mail-> subject = $subject;
        // $mail-> body = $txt;


        if ($run_insert_doctor_query) {
            echo "<script>alert('Your Registration Request has been sent successfully!')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        } else {
            echo "<script>alert('something went wrong')</script>";

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

            section .container .imgBx {
                display: none;
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
                <h1 class="display-3 text-white animated zoomIn">Doctor Registration</h1>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- registration form start -->
    <div class="container form_div mt-3">
        <div class="user signinBx">
            <div>
                <form method="post" enctype="multipart/form-data">
                    <div class="row jumbotron box8">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input class="input" type="text" name="f_name" placeholder="Enter your first name.">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Last name</label>
                            <input class="input" type="text" name="l_name"
                                placeholder="Enter your last name. (Optional)">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Email</label>
                            <input class="input" type="email" name="email" placeholder="Enter your email.">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Password</label>
                            <input class="input" type="Password" name="password" placeholder="Enter your password.">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Profile Image</label>
                            <input class="input" type="file" name="p_image">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Experience</label>
                            <input class="input" type="number" name="experience"
                                placeholder="Enter experience in years">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Qualification</label>
                            <select class=" custom-select browser-default" name="qualification">
                                <?php while ($qualification_row = mysqli_fetch_array($run_select_qualification)) { ?>
                                    <option value="<?php echo $qualification_row['qualification_id'] ?>">
                                        <?php echo $qualification_row['qualification_name'] ?>
                                    </option>
                                <?php }
                                ; ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Specialization</label>
                            <select class=" custom-select browser-default" name="specialization">
                                <?php while ($specialization_row = mysqli_fetch_array($run_select_specialization)) { ?>
                                    <option value="<?php echo $specialization_row['specialization_id'] ?>">
                                        <?php echo $specialization_row['specialization_name'] ?>
                                    </option>
                                <?php }
                                ; ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>City</label>
                            <select class=" custom-select browser-default" name="city">
                                <?php while ($city_row = mysqli_fetch_array($run_select_city)) { ?>
                                    <option value="<?php echo $city_row['city_id'] ?>">
                                        <?php echo $city_row['city_name'] ?>
                                    </option>
                                <?php }
                                ; ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Age</label>
                            <input class="input" type="number" name="age" placeholder="Enter your age">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Gender</label>
                            <select class=" browser-default custom-select" name="gender">
                                <option value="male" name="gender">Male</option>
                                <option value="female" name="gender">Female</option>
                                <option value="unspesified" name="gender">Unspecified</option>
                            </select>
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>Country code</label>
                            <select class=" browser-default custom-select">
                                <option data-countryCode="PK" value="92" selected>Pakistan (+92)</option>
                            </select>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Phone</label>
                            <input class="input" type="tel" name="phone" placeholder="Enter Your Contact Number.">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Whatsapp</label>
                            <input class="input" type="tel" name="whatsapp" placeholder="Enter Your Whatsapp Number.">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Degree Image</label>
                            <input class="input" type="file" name="deg_pic">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>NIC (front)</label>
                            <input class="input" type="file" name="nic_front_pic">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>NIC (back)</label>
                            <input class="input" type="file" name="nic_back_pic">
                        </div>

                        <div class="col-sm-12 form-group mb-0">
                            <button class="btn btn-primary float-right" name="btn_register">Regsiter</button>

                        </div>
                        <div>
                            <p class="signup">
                                Already have an account ?
                                <a href="doctor_login.php">Login</a>
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