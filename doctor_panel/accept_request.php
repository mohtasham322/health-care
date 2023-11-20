<?php
include("connection.php");
$id = $_GET['app_id'];
$select_app_row = "SELECT * FROM `appointment` WHERE appointment_id = $id";
$run_select_app_row = mysqli_query($connection, $select_app_row);
$update_app = "UPDATE `appointment` SET `appointment_status`= 'Accepted' WHERE appointment_id = $id";
$run_update_app = mysqli_query($connection, $update_app);
if($run_update_app){
    echo "<script> window.location.href = 'index.php' </script>";
}

?>