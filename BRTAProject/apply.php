<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BRTA Home</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
        if(isset($_POST['submit'])){
            // conection with database
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'brta';
            $conn = mysqli_connect($host, $user, $pass, $dbname);
            
            //value retrive from form
            $name = $_POST["name"];
            $email = $_POST["email"];
            $vehicle_no = $_POST["vehicle_no"];
            $chess_no = $_POST["chess_no"];
            $passport_size_photo = $_FILES["passport_size_photo"]["name"];
            $NID_soft_copy = $_FILES["NID_soft_copy"]["name"];
            $present_address = $_POST["present_address"];
            $permanent_address = $_POST["permanent_address"];

           // Handle file uploads
            $passport_size_photo = $_FILES["passport_size_photo"]["name"];
            $passport_size_photo_tmp = $_FILES["passport_size_photo"]["tmp_name"];
        
            $NID_soft_copy = $_FILES["NID_soft_copy"]["name"];
            $NID_soft_copy_tmp = $_FILES["NID_soft_copy"]["tmp_name"];
            
            //Pass this value into data base
            $sql = "INSERT INTO information (name, email, vehicle_no, chess_no, passport_size_photo, NID_soft_copy, present_address, permanent_address) 
            VALUES ('$name', '$email', '$vehicle_no', '$chess_no', '$passport_size_photo', '$NID_soft_copy', '$present_address', '$permanent_address')";
            //send Query
            mysqli_query($conn,$sql);
            move_uploaded_file($passport_size_photo_tmp, "uploads/$passport_size_photo");
            move_uploaded_file($NID_soft_copy_tmp, "uploads/$NID_soft_copy");
            $message = "Add Your Information";
        }
        else{
          $message2 = "Not save";
        }
        
    ?>
  <header>
    <div class="headsection">
      <div class="logo">
        <img src="images/logo.png" alt="">
      </div>
      <div class="text">
        <h4>বাংলাদেশ সড়ক পরিবহন কর্তৃপক্ষ</h4>
        <h5>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h5>
      </div>
      <div class="nav">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="login.php">Apply</a></li>
        </ul>
      </div>
    </div>
  </header>

 <div class="apply p-3 m-0 border-0 bd-example m-0 border-0">
  <h1 class="pt-5 pb-3">Apply</h1>
 <form class="row g-3 " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <div class="col-12">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Full name">
      </div>
      <div class="col-md-12">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="col-12">
        <label for="vehicle_no" class="form-label">Vehicle No</label>
        <input type="text" class="form-control" name="vehicle_no" placeholder="vehicle no">
      </div>
      <div class="col-12">
        <label for="chess_no" class="form-label">Chess No</label>
        <input type="text" class="form-control" name="chess_no" placeholder="chess no">
      </div>
      <div class="col-12">
        <label for="passport_size_photo" class="form-label">Passport Size Photo</label>
        <input type="file" class="form-control" name="passport_size_photo">
      </div>
      <div class="col-12">
        <label for="NID_soft_copy" class="form-label">NID Soft Copy</label>
        <input type="file" class="form-control" name="NID_soft_copy">
      </div>
      <div class="col-12">
        <label for="present_address" class="form-label">Present Address</label>
        <input type="text" class="form-control" name="present_address" placeholder="City, State, Zip">
      </div>
      <div class="col-12">
        <label for="permanent_address" class="form-label">Permanent Address</label>
        <input type="text" class="form-control" name="permanent_address" placeholder="City, State, Zip">
      </div>
      <div class="col-12 mb-5">
        <button type="submit" class="btn btn-primary" name="submit">Apply Now</button>
      </div>
    </form>
    <?php
      if (isset($message)) {
            echo "<p class='text-danger'>$message</p>";
        }
      ?>
 </div>
 

  
  <!-- Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/main.js"></script>
  
</body>
</html>

