<!DOCTYPE html>
<html lang="en">
<head>
  <title>SERVER INFO <?php echo getPageTitle(); ?></title>
  <?php include("../../config/includes/header.php"); ?>
</head>
<body>
<div id="app" class="app">
<?php include("../config/includes/sidebar.user.php"); ?>
  <div id="content" class="app-content">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo getDefaultURL(); ?>">HOME</a></li>
      <li class="breadcrumb-item active">SERVICE STATUS</li>
    </ol>

    <div class="row" id="slist"></div>

    <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
  </div>
<?php include("../config/includes/footer.php"); ?>
<script src="<?php echo getAssetsURL(); ?>js/status.js"></script>
</body>
</html>
