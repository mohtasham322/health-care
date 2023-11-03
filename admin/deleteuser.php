<?php
include("connection.php");
$id = $_GET['id'];
$select_user_row = "SELECT * FROM `users` WHERE user_id = $id";
$run_select_user_row = mysqli_query($connection, $select_user_row);
$update_user = "UPDATE `users` SET `status`= 1 WHERE user_id = $id";
$run_update_user = mysqli_query($connection, $update_user);
if($run_update_user){
    echo "<script> window.location.href = 'view_users.php' </script>";
}

?>