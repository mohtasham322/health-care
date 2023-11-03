<?php
include("connection.php");
$id = $_GET['d_id'];
$select_doctors_row = "SELECT * FROM `doctors` WHERE doctor_id = $id";
$run_select_doctors_row = mysqli_query($connection, $select_doctors_row);
$delete_doctors = "DELETE FROM `doctors` WHERE doctor_id = $id";
$run_delete_doctors = mysqli_query($connection, $delete_doctors);
if($run_delete_doctors){
    echo "<script> window.location.href = 'declined_doctors.php' </script>";
}

?>