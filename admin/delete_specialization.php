<?php
include("connection.php");
$id = $_GET['cat_id'];
$select_specialization_row = "SELECT * FROM `specialization` WHERE specialization_id = $id";
$run_select_specialization_row = mysqli_query($connection, $select_specialization_row);
$update_specialization = "UPDATE `specialization` SET `status`= 1 WHERE specialization_id = $id";
$run_update_specialization = mysqli_query($connection, $update_specialization);
if($run_update_specialization){
    echo "<script> window.location.href = 'viewspecialization.php' </script>";
}

?>