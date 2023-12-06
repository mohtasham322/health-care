<?php
ob_start();
include("admin/connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_doctor_login'])) {
        $ld_email = $_POST['email'];
        $ld_password = $_POST['password'];

        $select_doctor = "SELECT * FROM `doctors` WHERE doctor_email = '$ld_email'";
        $run_select_doctor = mysqli_query($connection, $select_doctor);
        $fetched_doctor = mysqli_fetch_assoc($run_select_doctor);
        // if(($ld_password) === ($fetched_doctor["doctor_password"])){
        //     echo $fetched_doctor["doctor_name"];
        // }

        if ($ld_password === $fetched_doctor["doctor_password"]) {
            $_SESSION['d_id'] = $fetched_doctor['doctor_id'];
            $_SESSION['d_name'] = $fetched_doctor['doctor_name'];
            $_SESSION['d_email'] = $fetched_doctor['doctor_email'];
        }
        if (isset($_SESSION['d_name'])) {
            // echo "session exists:";
            echo $_SESSION['d_name'];
        } else {
            //   echo "<script>alert('Invalid email or password')</script>";
            echo "session does not exists:";

        }
        ;
    }
}




?>