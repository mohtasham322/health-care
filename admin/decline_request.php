<?php
include("connection.php");
$id = $_GET['d_id'];
$select_user_row = "SELECT * FROM `doctors` WHERE doctor_id = $id";
$run_select_user_row = mysqli_query($connection, $select_user_row);
$update_user = "UPDATE `doctors` SET `status`= 'Declined' WHERE doctor_id = $id";
$run_update_user = mysqli_query($connection, $update_user);
if($run_update_user){
    echo "<script> window.location.href = 'doctor_request.php' </script>";
}

?>