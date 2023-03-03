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
<?php include("../../config/includes/sidebar.admin.php"); ?>
  <div id="content" class="app-content">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo getDefaultURL(); ?>">HOME</a></li>
      <li class="breadcrumb-item active">SERVER INFO</li>
    </ol>
     
    <?php
    ob_start();
    phpinfo();
    $phpinfo = ob_get_contents();
    ob_end_clean();
    $phpinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpinfo);
    echo "
        <style type='text/css'>
            #phpinfo {}
            #phpinfo pre {margin: 0; font-family: monospace;}
            #phpinfo a:link {color: #009; text-decoration: none; background-color: #fff;}
            #phpinfo a:hover {text-decoration: underline;}
            #phpinfo table {border-collapse: collapse; border: 0; width: 934px; box-shadow: 1px 2px 3px #ccc;}
            #phpinfo .center {text-align: center;}
            #phpinfo .center table {margin: 1em auto; text-align: left;}
            #phpinfo .center th {text-align: center !important;}
            #phpinfo td, th {border: 1px solid #666; font-size: 75%; vertical-align: baseline; padding: 4px 5px;}
            #phpinfo h1 {font-size: 150%;}
            #phpinfo h2 {font-size: 125%;}
            #phpinfo .p {text-align: left;}
            #phpinfo .e {width: 300px; font-weight: bold;}
            #phpinfo .h {font-weight: bold;}
            #phpinfo .v {max-width: 300px; overflow-x: auto; word-wrap: break-word;}
            #phpinfo .v i {color: #999;}
            #phpinfo img {float: right; border: 0;}
            #phpinfo hr {width: 934px; background-color: #ccc; border: 0; height: 1px;}
        </style>
        <div id='phpinfo'>
            $phpinfo
        </div>
        ";
     ?>

    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
  </div>
<?php include("../../config/includes/footer.php"); ?>
</body>
</html>
