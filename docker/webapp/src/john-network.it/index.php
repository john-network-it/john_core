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
   <title>OVERVIEW <?php echo getPageTitle(); ?></title>
   <?php include("../config/includes/header.php"); ?>
   <link href="<?php echo getAssetsURL(); ?>plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
</head>
<body>
<div id="app" class="app">
<?php include("../config/includes/sidebar.user.php"); ?>
   <div id="content" class="app-content">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?php echo getDefaultURL(); ?>">HOME</a></li>
         <li class="breadcrumb-item active">OVERVIEW</li>
      </ol>

         <div class="row">
            <div class="col-xl-6">
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="d-flex fw-bold small mb-3">
                        <span class="flex-grow-1">DEVICE MAP</span>
                        <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                     </div>
                     <div class="ratio ratio-21x9 mb-3">
                        <div id="world-map" class="jvectormap-without-padding"></div>
                     </div>
                     <div class="row gx-4">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                           <table class="w-100 small mb-0 text-truncate text-white text-opacity-60">
                              <thead>
                                 <tr class="text-white text-opacity-75">
                                    <th class="w-50">COUNTRY</th>
                                    <th class="w-25 text-end">VISITS</th>
                                    <th class="w-25 text-end">PCT%</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>FRANCE</td>
                                    <td class="text-end">13,849</td>
                                    <td class="text-end">40.79%</td>
                                 </tr>
                                 <tr>
                                    <td>SPAIN</td>
                                    <td class="text-end">3,216</td>
                                    <td class="text-end">9.79%</td>
                                 </tr>
                                 <tr class="text-theme fw-bold">
                                    <td>MEXICO</td>
                                    <td class="text-end">1,398</td>
                                    <td class="text-end">4.26%</td>
                                 </tr>
                                 <tr>
                                    <td>UNITED STATES</td>
                                    <td class="text-end">1,090</td>
                                    <td class="text-end">3.32%</td>
                                 </tr>
                                 <tr>
                                    <td>BELGIUM</td>
                                    <td class="text-end">1,045</td>
                                    <td class="text-end">3.18%</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="col-lg-6">
                           <div class="card">
                              <div class="card-body py-2">
                                 <div class="d-flex align-items-center">
                                    <div class="w-70px">
                                       <div data-render="apexchart" data-type="donut" data-height="70"></div>
                                    </div>
                                    <div class="flex-1 ps-2">
                                       <table class="w-100 small mb-0 text-white text-opacity-60">
                                          <tbody>
                                             <tr>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-95"></div>
                                                      ANDROID
                                                   </div>
                                                </td>
                                                <td class="text-end">25.70%</td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-75"></div>
                                                      WINDOWS
                                                   </div>
                                                </td>
                                                <td class="text-end">24.30%</td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-55"></div>
                                                      LINUX
                                                   </div>
                                                </td>
                                                <td class="text-end">23.05%</td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-35"></div>
                                                      IOS
                                                   </div>
                                                </td>
                                                <td class="text-end">14.85%</td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <div class="w-6px h-6px rounded-pill me-2 bg-theme bg-opacity-15"></div>
                                                      UNKNOWN
                                                   </div>
                                                </td>
                                                <td class="text-end">7.35%</td>
                                             </tr>
                                          </tbody>
                                       </table>
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
            </div>
            <div class="col-xl-6">
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="d-flex fw-bold small mb-3">
                        <span class="flex-grow-1">ACTIVITY LOG</span>
                        <a href="#" data-toggle="card-expand" class="text-white text-opacity-50 text-decoration-none"><i class="bi bi-fullscreen"></i></a>
                     </div>
                     <div class="table-responsive">
                        <table class="table table-striped table-borderless mb-2px small text-nowrap">
                           <tbody>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    You have sold an item - $1,299
                                    </span>
                                 </td>
                                 <td><small>just now</small></td>
                                 <td>
                                    <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PRODUCT</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-white-transparent-3 me-2"></i>
                                    Firewall upgrade
                                    </span>
                                 </td>
                                 <td><small>1 min ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">SERVER</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-white-transparent-3 me-2"></i>
                                    Push notification v2.0 installation
                                    </span>
                                 </td>
                                 <td><small>1 mins ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">ANDROID</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    New Subscription - 1yr Plan
                                    </span>
                                 </td>
                                 <td><small>1 min ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">SALES</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-white text-opacity-25 me-2"></i>
                                    2 Unread enquiry
                                    </span>
                                 </td>
                                 <td><small>2 mins ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">ENQUIRY</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    $30,402 received from Paypal
                                    </span>
                                 </td>
                                 <td><small>2 mins ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PAYMENT</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                    3 payment received
                                    </span>
                                 </td>
                                 <td><small>5 mins ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-theme text-theme-900 rounded-0 pt-5px w-70px" style="min-height: 18px">PAYMENT</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-white text-opacity-25 me-2"></i>
                                    1 pull request from github
                                    </span>
                                 </td>
                                 <td><small>5 mins ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">GITHUB</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-white-transparent-3 me-2"></i>
                                    3 pending invoice to generate
                                    </span>
                                 </td>
                                 <td><small>5 mins ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">INVOICE</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                              <tr>
                                 <td>
                                    <span class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-6px text-white text-opacity-25 me-2"></i>
                                    2 new message from fb messenger
                                    </span>
                                 </td>
                                 <td><small>7 mins ago</small></td>
                                 <td>
                                    <span class="badge d-block bg-white bg-opacity-25 rounded-0 pt-5px w-70px" style="min-height: 18px">INBOX</span>
                                 </td>
                                 <td><a href="#" class="text-decoration-none text-white"><i class="bi bi-search"></i></a></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="card-arrow">
                     <div class="card-arrow-top-left"></div>
                     <div class="card-arrow-top-right"></div>
                     <div class="card-arrow-bottom-left"></div>
                     <div class="card-arrow-bottom-right"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      <?php include("../config/includes/footer.php"); ?>
      <script src="<?php echo getAssetsURL(); ?>plugins/jvectormap-next/jquery-jvectormap.min.js" type="text/javascript"></script>
      <script src="<?php echo getAssetsURL(); ?>plugins/jvectormap-next/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
      <script src="<?php echo getAssetsURL(); ?>plugins/apexcharts/dist/apexcharts.min.js" type="text/javascript"></script>
      <script src="<?php echo getAssetsURL(); ?>js/demo/dashboard.demo.js"></script>
      
      <?php if(isset($_GET["login"]) && $_GET["login"] == "1") { ?>
      <script type="text/javascript">
      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 1000,
         timerProgressBar: true,
      })
      Toast.fire({
         icon: "success",
         title: "You have successfully logged into your account."
      }).then((result) => {
         var url = document.location.href;
         window.history.pushState({}, "", url.split("?")[0]);
      })
      </script>
      <?php } ?>
   </body>
</html>
