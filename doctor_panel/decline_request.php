<?php
include("connection.php");
$id = $_GET['app_id'];
$select_user_row = "SELECT * FROM `appointment` WHERE appointment_id = $id";
$run_select_user_row = mysqli_query($connection, $select_user_row);
$update_user = "UPDATE `appointment` SET `status`= 'declined' WHERE appointment_id = $id";
$run_update_user = mysqli_query($connection, $update_user);
if($run_update_user){
    echo "<script> window.location.href = 'appointment_request.php' </script>";
}

?>