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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Care</title>
  <link rel="stylesheet" href="css/sign_up.css">
   <script src="js/sign_up.js"></script>
</head>

<body>

  <body>
    <section>
     
      <div class="container">
        <div class="user signinBx">
          <div class="imgBx"><img src="img/Login-img-1.avif" alt="" /></div>
          <div class="formBx">
            <form action="" onsubmit="return false;">
              <h2>Sign In</h2>
              <input type="text" name="" placeholder="Username" />
              <input type="password" name="" placeholder="Password" />
              <input type="submit" name="" value="Login" />
              <p class="signup">
                Don't have an account ?
                <a href="#" onclick="toggleForm();">Sign Up</a>
              </p>
            </form>
          </div>
        </div>
        <div class="user signupBx">
          <div class="formBx">
            <form action="" onsubmit="return false;">
              <h2>Create an account</h2>
              <input type="text" name="username" placeholder="Username" />
              <input type="email" name="useremail" placeholder="Email Address" />
              <input type="password" name="user_password" placeholder="Create Password" />
              <input type="submit" name="" value="Sign Up" />
              <p class="signup">
                Already have an account ?
                <a href="#" onclick="toggleForm();">Sign in</a>
              </p>
            </form>
          </div>
          <div class="imgBx"><img src="img/Login-img-2.jpg" alt="" /></div>
        </div>
      </div>
    </section>
</body>
</html>