<?php
include("connection.php");
$id = $_GET['inven_id'];
$select_inven_row = "DELETE FROM `medical_inventions` WHERE inven_id = $id";
$run_delete_inven_row = mysqli_query($connection, $select_inven_row);
header('location:medical_inventions.php;')


?>