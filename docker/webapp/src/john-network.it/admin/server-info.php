<?php
   require("../../config/Database.php");
   require("../../config/Functions.php");
   
   //Check database connection
   if (!isset($con)) {
       http_response_code(503);
       die("The connection to the database could not be established. Try again later!");
   }
   
   //Start session
   session_start();
   
   //Check if logged in
   if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
       header("location: ". getAuthURL() ."login.php");
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
  <title>SERVER INFO <?php echo getPageTitle(); ?></title>
  <?php include("../../config/includes/header.php"); ?>
</head>
<body>
<div id="app" class="app">
<?php include("../../config/includes/sidebar.user.php"); ?>
  <div id="content" class="app-content">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo getDefaultURL(); ?>">HOME</a></li>
      <li class="breadcrumb-item active">SERVER INFO</li>
    </ol>

    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
  </div>
<?php include("../../config/includes/footer.php"); ?>
</body>
</html>
