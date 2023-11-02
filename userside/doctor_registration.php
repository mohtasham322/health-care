<?php 
include("../admin/connection.php");
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require '../PHPMailer-master/autoload.php'; // Path to the Composer autoload file
$select_qualification = "SELECT * FROM `qualification`";
$run_select_qualification = mysqli_query($connection, $select_qualification);
$select_specialization = "SELECT * FROM `specialization`";
$run_select_specialization = mysqli_query($connection, $select_specialization);  
$select_city = "SELECT * FROM `city`";
$run_select_city = mysqli_query($connection, $select_city);  
if($_SERVER["REQUEST_METHOD"]=== "POST"){
  if(isset($_POST["btn_register"])){
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $full_name = $f_name .' '. $l_name;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $p_image = $_FILES['p_image'];
    $p_image_name = $_FILES['p_image']['name'];
    $p_image_temp_name = $_FILES['p_image']['tmp_name'];
    $p_image_path = "../doctors_images/".$p_image_name;
    move_uploaded_file($p_image_temp_name, $p_image_path);
    $experience = $_POST['experience'];
    $qualification = $_POST['qualification'];
    $specialization = $_POST['specialization'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['whatsapp'];
    $deg_image = $_FILES['deg_pic'];
    $deg_image_name = $_FILES['deg_pic']['name'];
    $deg_image_tmp_name = $_FILES['deg_pic']['tmp_name'];
    $deg_image_path = "../degree_images/".$deg_image_name;
    move_uploaded_file($deg_image_tmp_name, $deg_image_path);
    $nic_front_image = $_FILES['nic_front_pic'];
    $nic_front_image_name = $_FILES['nic_front_pic']['name'];
    $nic_front_image_tmp_name = $_FILES['nic_front_pic']['tmp_name'];
    $nic_front_image_path = "../nic_images/".$nic_front_image_name;
    move_uploaded_file($nic_front_image_tmp_name, $nic_front_image_path);
    $nic_back_image = $_FILES['nic_back_pic'];
    $nic_back_image_name = $_FILES['nic_back_pic']['name'];
    $nic_back_image_tmp_name = $_FILES['nic_back_pic']['tmp_name'];
    $nic_back_image_path = "../nic_images/".$nic_back_image_name;
    move_uploaded_file($nic_back_image_tmp_name, $nic_back_image_path);
    $insert_doctor_query = "INSERT INTO `doctors`(`doctor_name`, `doctor_email`, `doctor_password`, `doctor_pic`, `doctor_exp`, `doctor_qualification`, `doctor_contact`, `doctor_degree_pic`, `doctor_nic_front_pic`, `doctor_nic_back_pic`, `doctor_city`, `doctor_whatsapp`, `doctor_gender`, `doctor_specialization`) VALUES ('$full_name','$email','$password ','$p_image_path','$experience','$qualification','$phone','$deg_image_path','$nic_front_image_path','$nic_back_image_path','$city','$whatsapp','$gender','$specialization')";
    $run_insert_doctor_query = mysqli_query($connection, $insert_doctor_query);
    
    // $subject = "registration request on care website";
    // $txt = "Your registration request has been sent successfully and you will be responded within 24 working hours";
    // $mail = new PHPMailer();
    // $mail-> isSMTP();
    // $mail-> Host = 'SMTP.gmail.com';
    // $mail-> SMTPauth = true;
    // $mail-> Username = 'mmhashmi322@gmail.com';
    // $mail-> Password = '';
    // $mail-> SMTPSecure = 'tls';
    // $mail-> Port = 587;
    // $mail-> setfrom("mmhashmi322@gmail.com");
    // $mail-> addAddress($email);
    // $mail-> subject = $subject;
    // $mail-> body = $txt;
    

    if($run_insert_doctor_query){
      echo "<script>alert('query inserted successfully')</script>";
    }
    else{
      echo "<script>alert('something went wrong')</script>";

    }



  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="css/doctor_registration.css">
  <title>Document</title>
</head>
<body>
<div class="container mt-3">
  <form method="post" enctype="multipart/form-data">
    <div class="row jumbotron box8">
      <div class="col-sm-12 mx-t3 mb-4">
        <h2 class="text-center text-info">Doctor Registration Form</h2>
      </div>
      <div class="col-sm-6 form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="f_name"  placeholder="Enter your first name." >
      </div>
      <div class="col-sm-6 form-group">
        <label>Last name</label>
        <input type="text" class="form-control" name="l_name"  placeholder="Enter your last name. (Optional)" >
      </div>
      <div class="col-sm-6 form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email"  placeholder="Enter your email." >
      </div>
      <div class="col-sm-6 form-group">
        <label>Password</label>
        <input type="Password" name="password" class="form-control"  placeholder="Enter your password." >
      </div>
      <div class="col-sm-6 form-group">
        <label>Profile Image</label>
        <input type="file" class="form-control" name="p_image"   >
      </div>
      <div class="col-sm-6 form-group">
        <label>Experience</label>
        <input type="number" name="experience" class="form-control"   placeholder="Enter experience in years" >
      </div>
      <div class="col-sm-6 form-group">
        <label >Qualification</label>
        <select class="form-control custom-select browser-default" name="qualification" >
          <?php while($qualification_row = mysqli_fetch_array($run_select_qualification)){?>
            <option value="<?php echo $qualification_row['qualification_id'] ?>" > <?php echo $qualification_row['qualification_name'] ?></option>
          <?php }; ?>
        </select>
      </div>
      <div class="col-sm-6 form-group">
        <label>Specialization</label>
        <select class="form-control custom-select browser-default" name="specialization" >
          <?php while($specialization_row = mysqli_fetch_array($run_select_specialization)){?>
            <option value="<?php echo $specialization_row['specialization_id'] ?>" > <?php echo $specialization_row['specialization_name'] ?></option>
          <?php }; ?>
        </select>
      </div>
      <div class="col-sm-6 form-group">
        <label>City</label>
        <select class="form-control custom-select browser-default" name="city">
          <?php while($city_row = mysqli_fetch_array($run_select_city)){?>
            <option value="<?php echo $city_row['city_id'] ?>" > <?php echo $city_row['city_name'] ?></option>
          <?php }; ?>
        </select>
      </div>
      <div class="col-sm-6 form-group">
        <label>Age</label>
        <input type="number" name="age" class="form-control"  placeholder="Enter your age" >
      </div>
      <div class="col-sm-6 form-group">
        <label>Gender</label>
        <select class="form-control browser-default custom-select" name="gender" >
          <option value="male" name="gender" >Male</option>
          <option value="female" name="gender" >Female</option>
          <option value="unspesified" name="gender" >Unspecified</option>
        </select>
      </div>
      <div class="col-sm-2 form-group">
        <label>Country code</label>
        <select class="form-control browser-default custom-select">
          <option data-countryCode="PK" value="92" selected>Pakistan (+92)</option>
        </select>
      </div>
      <div class="col-sm-4 form-group">
        <label>Phone</label>
        <input type="tel" name="phone" class="form-control"  placeholder="Enter Your Contact Number." >
      </div>
      <div class="col-sm-6 form-group">
        <label>Whatsapp</label>
        <input type="tel" class="form-control" name="whatsapp" placeholder="Enter Your Whatsapp Number." >
      </div>
      <div class="col-sm-6 form-group">
        <label>Degree Image</label>
        <input type="file" class="form-control"  name="deg_pic"  >
      </div>
      <div class="col-sm-6 form-group">
        <label>NIC (front)</label>
        <input type="file" class="form-control"  name="nic_front_pic"   >
      </div>
      <div class="col-sm-6 form-group">
        <label >NIC (back)</label>
        <input type="file" class="form-control"  name="nic_back_pic"  >
      </div>

      <!-- <div class="col-sm-12">
        <input type="checkbox" class="form-check d-inline" ><label for="chb" class="form-check-label">&nbsp;I accept all terms and conditions.
        </label>
      </div> -->

      <div class="col-sm-12 form-group mb-0">
        <button class="btn btn-primary float-right" name="btn_register">Submit</button>
      </div>

    </div>
  </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
