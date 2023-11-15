<?php
include("../admin/connection.php");
if (isset($_SESSION['p_id'])) {
    echo "Session exists!";
} else {
    echo "Session does not exist!";
}


?>