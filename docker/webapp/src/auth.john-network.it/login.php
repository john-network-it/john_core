<?php
require("../config/Database.php");
require("../config/Functions.php");

if(!isset($con)) {
  http_response_code(503);
  die("The connection to the database could not be established. Try again later!");
}

session_start();

if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
  header("location: ". getDefaultURL() ."index.php?login=1");
}
    

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $pass_query = mysqli_query($con, "SELECT * FROM `john_user` WHERE `email`='$email'");
    $pass_result = mysqli_num_rows($pass_query);

    $userinfo_result = mysqli_query($con, "SELECT * FROM `john_user` WHERE `email`='$email'");
    $userinfo = mysqli_fetch_array($userinfo_result);
  } else {
    header("location: login.php?failed=2");
  }

  if($pass_result == null || $pass_result != 1) {
    header("location: login.php?failed=2");
  }

  $db_password = $userinfo['password'];
  $form_password = hash('sha512', $password);

  if($form_password == $db_password) {
    $_SESSION['id'] = $userinfo['id'];
    $_SESSION['username'] = $userinfo['username'];
    $_SESSION["logged_in"] = true;
    $_SESSION['logged_in_at'] = date("Y-m-d H:m:s");

    header("location: login.php");
  } else {
    header("location: login.php?failed=2");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../config/includes/header.php"); ?>
  <title>LOGIN <?php echo getPageTitle(); ?></title>
  <link rel="stylesheet" href="<?php echo getAssetsURL(); ?>css/app.min.css">
  <link rel="stylesheet" href="<?php echo getAssetsURL(); ?>css/vendor.min.css">
</head>
<body class='pace-top'>
<div id="app" class="app app-full-height app-without-header">
  <div class="login">
    <div class="login-content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1 class="text-center">J.O.H.N.</h1>
        <div class="text-white text-opacity-50 text-center mb-4">
          For your protection, please verify your identity.
        </div>
        <?php if(isset($_GET["failed"]) && $_GET["failed"] == "1") { ?>
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading text-center">Authentication failed</h4>
          <p>A server error occurred while logging in. Please try again in a few minutes...</p>
          <hr>
          <p class="mb-0 text-center small">If the problem persists, contact an administrator</p>
        </div>
        <?php } ?>
        <?php if(isset($_GET["failed"]) && $_GET["failed"] == "2") { ?>
        <div class="alert alert-warning" role="alert">
          <h4 class="alert-heading text-center">Authentication failed</h4>
          <p>The username or password is wrong!</p>
          <hr>
          <p class="mb-0 text-center small"><a class="ms-auto text-white text-decoration-underline text-opacity-50" href="forgot-password.php">Reset Password</a></p>
        </div>
        <?php } ?>
        <?php if(isset($_GET["logout"]) && $_GET["logout"] == "1") { ?>
          <div class="alert alert-success" role="alert">
          <h4 class="alert-heading text-center">Logged out</h4>
          <p>You have successfully logged out of your account.</p>
        </div>
        <?php } ?>
        <div class="mb-3">
          <label class="form-label">Email Address <span class="text-danger">*</span></label>
          <input tabindex="1" type="email" class="form-control form-control-lg bg-white bg-opacity-5" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
          <div class="d-flex">
            <label class="form-label">Password <span class="text-danger">*</span></label>
            <a tabindex="4" href="#" class="ms-auto text-white text-decoration-none text-opacity-50">Forgot password?</a>
          </div>
          <input tabindex="2" type="password" class="form-control form-control-lg bg-white bg-opacity-5" name="password" placeholder="Password" required>
        </div>
        <button tabindex="3" type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</button>
      </form>
    </div>
  </div>
</div>
  <?php include("../config/includes/footer.php"); ?>
  <?php if(isset($_GET["failed"]) || isset($_GET["logout"])) { ?>
  <script type="text/javascript">
  $(function(){
    function remove_url_parameters(){
      var url = document.location.href;
      window.history.pushState({}, "", url.split("?")[0]);
    };
    window.setTimeout( remove_url_parameters, 2500 );
  });
  </script>
  <?php } ?>
</body>
</html>
