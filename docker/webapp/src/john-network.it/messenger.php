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
  <title>MESSENGER <?php echo getPageTitle(); ?></title>
  <?php include("../config/includes/header.php"); ?>
</head>
<body>
<div id="app" class="app">
<?php include("../config/includes/sidebar.user.php"); ?>
  <div id="content" class="app-content">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo getDefaultURL(); ?>">HOME</a></li>
      <li class="breadcrumb-item active">MESSENGER</li>
    </ol>

    <div class="card h-100">
<div class="messenger">
<div class="messenger-sidebar">
<div class="messenger-sidebar-header">
<h3 class="mb-10px">Chats</h3>
<div class="position-relative">
<button type="submit" class="btn position-absolute top-0"><i class="bi bi-search"></i></button>
<input type="text" class="form-control rounded-pill ps-35px" placeholder="Search Messenger">
</div>
</div>
<div class="messenger-sidebar-body">
<div data-scrollbar="true" data-height="100%" class="ps ps--active-y" data-init="true" style="height: 100%;">
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link active">
<div class="messenger-media bg-theme text-black text-opacity-75 rounded-pill fs-24px fw-bold">
<i class="bi bi-android2"></i>
</div>
<div class="messenger-info">
<div class="messenger-name">Mobile App Development Group 10</div>
<div class="messenger-text">Roberto says Hey Gabe, can you forward me the meeting notes?</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">13:02</div>
<div class="messenger-badge">2</div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-2.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Roberto</div>
<div class="messenger-text">Say hello to Alice</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">14:59</div>
<div class="messenger-badge">1</div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-3.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Graduation Party</div>
<div class="messenger-text"><b>Dan:</b> Wow, almost 2,500 members!</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">14:42</div>
<div class="messenger-badge empty"></div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-4.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Karen Stanford</div>
<div class="messenger-text">Table for four, 2 PM. Be there.</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">14:40</div>
<div class="messenger-badge empty"></div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-5.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Wave Hunters</div>
<div class="messenger-text"><b>Monika Parker: Poll</b></div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">12:45</div>
<div class="messenger-badge empty"></div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-6.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Little Sister</div>
<div class="messenger-text">I got a job at NASA!</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">12:45</div>
<div class="messenger-badge empty"></div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-7.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Monika Parker</div>
<div class="messenger-text">I don't remember anything.</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time"><i class="bi bi-check2-all"></i> 10:00</div>
<div class="messenger-badge empty"></div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-8.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Cat Videos</div>
<div class="messenger-text"><b><i class="bi bi-play-circle-fill"></i> Video</b></div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">09:00</div>
<div class="messenger-badge empty"></div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-9.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Garrick Banks</div>
<div class="messenger-text">What are we doing for Jen's birthday on Friday?</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">09:41</div>
<div class="messenger-badge empty"></div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-10.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Michelle</div>
<div class="messenger-text">Let's get lunch tomorrow</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">08:45</div>
<div class="messenger-badge">1</div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-2.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">Dana Klein</div>
<div class="messenger-text">Next Friday works for me</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">08:30</div>
<div class="messenger-badge">1</div>
</div>
</a>
</div>
<div class="messenger-item">
<a href="#" data-toggle="messenger-content" class="messenger-link">
<div class="messenger-media">
<img src="assets/img/user/user-1.jpg" class="mw-100 mh-100 rounded-pill">
</div>
<div class="messenger-info">
<div class="messenger-name">April</div>
<div class="messenger-text">Yes or yes? ;)</div>
</div>
<div class="messenger-time-badge">
<div class="messenger-time">08:22</div>
<div class="messenger-badge empty"></div>
</div>
</a>
</div>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 434px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 230px;"></div></div></div>
</div>
</div>
<div class="messenger-content">
<div class="messenger-content-header">
<div class="messenger-content-header-mobile-toggler">
<a href="#" data-toggle="messenger-content" class="me-2">
<i class="bi bi-chevron-left"></i>
</a>
</div>
<div class="messenger-content-header-media">
<div class="media bg-theme text-black text-opacity-75 rounded-pill fs-24px fw-bold">
<i class="bi bi-android2"></i>
</div>
</div>
<div class="messenger-content-header-info">
Mobile App Development Group
<small>10 members</small>
</div>
<div class="messenger-content-header-btn">
<a href="#" class="btn btn-link"><i class="bi bi-search"></i></a>
<span class="dropdown">
<a href="#" class="btn btn-link" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
<div class="dropdown-menu fs-11px">
<a href="#" class="dropdown-item d-flex align-items-center"><i class="bi bi-pencil-square fs-14px my-n1 me-3 ms-n2"></i> EDIT</a>
<a href="#" class="dropdown-item d-flex align-items-center"><i class="bi bi-info-circle fs-14px my-n1 me-3 ms-n2"></i> INFO</a>
<a href="#" class="dropdown-item d-flex align-items-center"><i class="bi bi-bell-slash fs-14px my-n1 me-3 ms-n2"></i> MUTE</a>
<a href="#" class="dropdown-item d-flex align-items-center"><i class="bi bi-x-circle fs-14px my-n1 me-3 ms-n2"></i> CLEAR CHAT HISTORY</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item d-flex align-items-center text-danger"><i class="bi bi-trash fs-14px my-n1 me-3 ms-n2"></i> DELETE AND LEAVE</a>
</div>
</span>
</div>
</div>
<div class="messenger-content-body">
<div data-scrollbar="true" data-height="100%" class="ps ps--active-y" data-init="true" style="height: 100%;">
<div class="widget-chat">
<div class="widget-chat-date">YESTERDAY</div>
<div class="widget-chat-item">
<div class="widget-chat-media"><img src="assets/img/user/user-5.jpg" alt=""></div>
<div class="widget-chat-content">
<div class="widget-chat-name">Ann Gray</div>
<div class="widget-chat-message">
Hey folks, please check your emails. I have shared you the slide.
</div>
<div class="widget-chat-status">Yesterday 3:25PM</div>
</div>
</div>
<div class="widget-chat-item">
<div class="widget-chat-media"><img src="assets/img/user/user-6.jpg" alt=""></div>
<div class="widget-chat-content">
<div class="widget-chat-name">Jeffrey Clark</div>
<div class="widget-chat-message">
Hey folks, please check your emails. I have shared you the slide.
</div>
<div class="widget-chat-status">Yesterday 3:27PM</div>
</div>
</div>
<div class="widget-chat-item">
<div class="widget-chat-media"><img src="assets/img/user/user-7.jpg" alt=""></div>
<div class="widget-chat-content">
<div class="widget-chat-name">Adam Lee</div>
<div class="widget-chat-message">
Yes, we are going to use this slide. But we will have only 5 minutes to present it.
</div>
<div class="widget-chat-status">Yesterday 3:30PM</div>
</div>
</div>
<div class="widget-chat-date">TODAY</div>
<div class="widget-chat-item">
<div class="widget-chat-media"><img src="assets/img/user/user-1.jpg" alt=""></div>
<div class="widget-chat-content">
<div class="widget-chat-name">Roberto Lambert</div>
<div class="widget-chat-message">
Hi, will be a little late to the production meeting.
</div>
<div class="widget-chat-status">2:21PM</div>
</div>
</div>
<div class="widget-chat-item reply">
<div class="widget-chat-content">
<div class="widget-chat-message last">
No problem. I will be sure to take notes.
</div>
<div class="widget-chat-status">2:22PM</div>
</div>
</div>
<div class="widget-chat-item">
<div class="widget-chat-media"><img src="assets/img/user/user-2.jpg" alt=""></div>
<div class="widget-chat-content">
<div class="widget-chat-name">Roberto Lambert</div>
<div class="widget-chat-message">
Thank you! I should be there by 9:10.
</div>
<div class="widget-chat-status">2:25PM</div>
</div>
</div>
<div class="widget-chat-item reply">
<div class="widget-chat-content">
<div class="widget-chat-message last">
Don't rush. I've got it covered.
</div>
<div class="widget-chat-status">2:27PM</div>
</div>
</div>
<div class="widget-chat-item">
<div class="widget-chat-media"><img src="assets/img/user/user-1.jpg" alt=""></div>
<div class="widget-chat-content">
<div class="widget-chat-name">Roberto Lambert</div>
<div class="widget-chat-message">
Hey Gabe, can you forward me the meeting notes?
</div>
<div class="widget-chat-status">4:30PM</div>
</div>
</div>
</div>
<div class="ps__rail-x" style="left: 0px; bottom: -450px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 450px; height: 401px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 213px; height: 188px;"></div></div></div>
</div>
<div class="messenger-content-footer">
<div class="input-group input-group-lg position-relative">
<button class="btn position-absolute start-0" id="trigger"><i class="far fa-face-smile"></i></button>
<input type="text" class="form-control rounded-start ps-45px" id="input" placeholder="Write a message...">
<button class="btn btn-outline-default" type="button"><i class="fa fa-paper-plane text-muted"></i></button>
</div>
</div>
</div>
</div>

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
<script src="assets/js/demo/page-messenger.demo.js"></script>
</body>
</html>
