<?php
include("connection.php");
$id = $_GET['cat_id'];
$select_category_row = "SELECT * FROM `category` WHERE category_id = $id";
$run_select_category_row = mysqli_query($connection, $select_category_row);
$update_category = "UPDATE `category` SET `status`= 1 WHERE category_id = $id";
$run_update_category = mysqli_query($connection, $update_category);
if($run_update_category){
    echo "<script> window.location.href = 'viewcategories.php' </script>";
}

?>