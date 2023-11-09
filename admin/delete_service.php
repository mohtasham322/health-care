<?php
include("connection.php");
$id = $_GET['service_id'];
$select_service_row = "SELECT * FROM `services` WHERE service_id = $id";
$run_select_service_row = mysqli_query($connection, $select_service_row);
$update_service = "UPDATE `services` SET `status`= 1 WHERE service_id = $id";
$run_update_service = mysqli_query($connection, $update_service);
if($run_update_service){
    echo "<script> window.location.href = 'view_services.php' </script>";
}

?>