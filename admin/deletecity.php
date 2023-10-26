<?php
include("connection.php");
$id = $_GET['id'];
$select_city_row = "SELECT * FROM `city` WHERE city_id = $id";
$run_select_city_row = mysqli_query($connection, $select_city_row);
$update_city = "UPDATE `city` SET `status`= 1 WHERE city_id = $id";
$run_update_city = mysqli_query($connection, $update_city);
if($run_update_city){
    echo "<script> window.location.href = 'viewcities.php' </script>";
}

?>