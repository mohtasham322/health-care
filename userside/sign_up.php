<?php 
include("../admin/connection.php");
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['btn_signup'])){
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $userpassword = $_POST['user_password'];
        $insert_users = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`) VALUES ('$username','$useremail','$userpassword')";
        $run_insert_users = mysqli_query($connection, $insert_users);
    };
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/sign_up.css">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="email" name="useremail" placeholder="Email" required="">
					<input type="password" name="user_password" placeholder="Password" required="">
					<button class="btn_login" name="btn_signup" >Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button class="btn_login">Login</button>
				</form>
			</div>
	</div>
</body>
</html>