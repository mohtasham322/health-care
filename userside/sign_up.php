<?php
include("../admin/connection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['btn_signup'])) {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['user_password'];
    // $user_array = array(
    //   'name' => $username,
    //   'email' => $useremail,
    //   'password' => $userpassword
    // );
    $insert_users = "INSERT INTO `patients`(`patient_name`, `patient_email`, `patient_password`) VALUES ('$username','$useremail','$userpassword')";
    $run_insert_users = mysqli_query($connection, $insert_users);
    if ($run_insert_users) {
      // $_SESSION['user_session'] = $user_array;
      echo "<script>window.location.href = 'index.php'</script>";

    } else {
      echo "<script>alert('sign Up failed!')</script>";
    }
  } else if (isset($_POST['btn_login'])) {
    $l_useremail = $_POST['l_useremail'];
    $l_userpassword = $_POST['l_userpassword'];

    $select_user = "SELECT * FROM `patients` WHERE patient_email = '$l_useremail'";
    $run_select_user = mysqli_query($connection, $select_user);
    $fetched_patient = mysqli_fetch_assoc($run_select_user);

    if ($l_userpassword == $fetched_patient["patient_password"]) {
      $_SESSION['p_id'] = $fetched_patient['patient_id'];
      $_SESSION['p_name'] = $fetched_patient['patient_name'];
      $_SESSION['p_email'] = $fetched_patient['patient_email'];

      echo "<script>window.location.href = 'index.php'</script>";
    } else {
      echo "<script>alert('Invalid email or password')</script>";
    }
  }
}










?>
<!-- lsd -->

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
      <!-- Login -->
      <div class="container">
        <div class="user signinBx">
          <div class="imgBx"><img src="img/Login-img-1.avif" alt="" /></div>
          <div class="formBx">
            <form method="post">
              <h2>Sign In</h2>
              <input type="text" name="l_useremail" placeholder="Username" />
              <input type="password" name="l_userpassword" placeholder="Password" />
              <!-- <button type="submit" name="btn_login" value="Login" >Login</button> -->
              <input type="submit" name="btn_login" value="Login">

              <p class="signup">
                Don't have an account ?
                <a href="#" onclick="toggleForm();">Sign Up</a>
              </p>
            </form>
          </div>
        </div>

        <!-- login end -->
        <div class="user signupBx">
          <div class="formBx">
            <form method="POST">
              <h2>Create an account</h2>
              <input type="text" class="form-control" name="username" placeholder="Username" />
              <input type="email" name="useremail" placeholder="Email Address" />
              <input type="password" name="user_password" placeholder="Create Password" />
              <input type="submit" name="btn_signup" value="Sign Up">
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