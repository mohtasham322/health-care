<?php
include("connection.php");
$id = $_GET['news_id'];
$select_news_row = "DELETE FROM `medical_news` WHERE news_id = $id";
$run_delete_news_row = mysqli_query($connection, $select_news_row);
header('location:medical_news.php;')


?>