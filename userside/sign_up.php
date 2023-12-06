<?php
include("../admin/connection.php");
session_start();
$username_error = $email_error = $password_error = "";
$select_patients = "SELECT * FROM `patients`";
$select_run_patients = mysqli_query($connection, $select_patients);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['btn_signup'])) {
    if (empty($_POST['username'])) {
      $username_error = "username is required";
    } else {
      $username = $_POST['username'];
    }
    $useremail = $_POST['useremail'];
    $email_pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if (!preg_match($email_pattern, $useremail)) {
      $email_error = "Email is not valid.";
    } else {
      $useremail = $_POST['useremail'];
    }
    if (empty($_POST['user_password'])) {
      $password_error = "password is required";
    } else {
      $userpassword = $_POST['user_password'];
      if (strlen($userpassword) < 8) {
        $password_error = "password must contain atleast 8 characters";
      }
      ;
      if (strlen($userpassword) > 20) {
        $password_error = "password must contain atmost 20 characters";
      }
      ;
      if (!preg_match("/[0-9]/", $userpassword)) {
        $password_error = "password must include atleast one number";
      }
      if (!preg_match("/[A-Z]/", $userpassword)) {
        $password_error = "password must include atleast one capital letter";
      }
      if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>?~]/", $userpassword)) {
        $password_error = "password must include atleast one special character ";
      } else {
        $email_exists = false;
        while ($patients_row = mysqli_fetch_assoc($select_run_patients)) {
          if ($useremail == $patients_row['patient_email']) {
            $email_exists = true;
            echo "<script>alert('User already exists. Try to log in')</script>";
            break;
          }
        }
        if (!$email_exists) {
          $insert_users = "INSERT INTO `patients`(`patient_name`, `patient_email`, `patient_password`) VALUES ('$username','$useremail','$userpassword')";
          $run_insert_users = mysqli_query($connection, $insert_users);
          echo "<script>alert('Your account has been created, log in to your account')</script>";
        }
      }

    }



  }
}


if (isset($_POST['btn_login'])) {
  $l_useremail = $_POST['l_useremail'];
  $l_userpassword = $_POST['l_userpassword'];

  $select_user = "SELECT * FROM `patients` WHERE patient_email = '$l_useremail'";
  $run_select_user = mysqli_query($connection, $select_user);
  $fetched_patient = mysqli_fetch_assoc($run_select_user);

  if ($l_userpassword === $fetched_patient["patient_password"]) {
    $_SESSION['p_id'] = $fetched_patient['patient_id'];
    $_SESSION['p_name'] = $fetched_patient['patient_name'];
    $_SESSION['p_email'] = $fetched_patient['patient_email'];

    echo "<script>window.location.href = '../index.php'</script>";
  } else {
    echo "<script>alert('Invalid email or password')</script>";
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
              <p style="color: red; font-size:15px;">
                <?php
                echo $username_error;
                ?>
              </p>
              <input type="email" name="useremail" placeholder="Email Address" />
              <p style="color: red;">
                <?php
                echo $email_error;
                ?>
              </p>
              <input type="password" name="user_password" placeholder="Create Password" />
              <p style="color: red;">
                <?php
                echo $password_error;
                ?>
              </p>
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