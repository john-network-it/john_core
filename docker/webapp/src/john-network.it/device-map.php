<?php
   require("../config/Database.php");
   require("../config/Functions.php");
   
   //Check database connection
   if (!isset($con)) {
       http_response_code(503);
       die("The connection to the database could not be established. Try again later!");
   }
   
   //Start session
   session_start();
   
   //Check if logged in
   if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
       header("location: auth/login.php");
       exit;
   }
   
   //User information
   $userinfo = sqlQuery($con, "SELECT * FROM `john_user` WHERE id=" . $_SESSION['id']);
   
   //Get User Group
   $usergroup = sqlQuery($con, "SELECT * FROM `john_user_groups_members` WHERE userid=" . $userinfo['id']);
   
   //User Group information
   $usergroupinfo = sqlQuery($con, "SELECT * FROM `john_user_groups` WHERE id=" . $usergroup['groupid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DEVICE MAP <?php echo getPageTitle(); ?></title>
  <?php include("../config/includes/header.php"); ?>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
</head>
<body>
<div id="app" class="app">
<?php include("../config/includes/sidebar.user.php"); ?>
  <div id="content" class="app-content">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo getDefaultURL(); ?>">HOME</a></li>
      <li class="breadcrumb-item active">DEVICE MAP</li>
    </ol>

    <div class="card">
      <div class="card-header fw-bold small">DEVICE MAP</div>
      <div class="card-body">
        <div id="map"></div>
      </div>
      <!-- arrow -->
      <div class="card-arrow">
        <div class="card-arrow-top-left"></div>
        <div class="card-arrow-top-right"></div>
        <div class="card-arrow-bottom-left"></div>
        <div class="card-arrow-bottom-right"></div>
      </div>
    </div>

    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
  </div>
<?php include("../config/includes/footer.php"); ?>
<script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
<script src="<?php echo getAssetsURL(); ?>js/device-map.js" type="text/javascript"></script>
</body>
</html>
