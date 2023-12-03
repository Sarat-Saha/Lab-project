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
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Simple example, replace this with proper validation and database checks
    $sql = "SELECT user_id FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Start a new session
        session_start();

        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;

        // Redirect user to home page
        header("location: apply.php");
    } else {
        $error_message = "Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
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

  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3 class="mb-5">Sign In to <br><strong>বাংলাদেশ সড়ক পরিবহন কর্তৃপক্ষ</strong></h3>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group first">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group last mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">
                </form>

                <?php
                if (isset($error_message)) {
                    echo "<p class='text-danger'>$error_message</p>";
                }
                ?>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
 

  
  <!-- Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/main.js"></script>
  
</body>
</html>

