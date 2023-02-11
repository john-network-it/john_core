<div id="header" class="app-header">
   <div class="desktop-toggler">
      <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
      </button>
   </div>
   <div class="mobile-toggler">
      <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
      </button>
   </div>
   <div class="brand">
      <a href="<?php echo getDefaultURL(); ?>" class="brand-logo mx-auto">
      <img src="<?php echo getAssetsURL(); ?>img/john/small_white.png" width="150" height="150" />
      </a>
   </div>
   <div class="menu">
     <div class="menu-item">
       <a class="menu-link fullscreen-toggler" href="#" aria-expanded="false">
         <div class="menu-icon"><i id="fullscreen-toggler-icon" class="fa-solid fa-expand nav-icon"></i></div>
       </a>
     </div>
      <?php if($usergroup['groupid'] == "1") { ?>
      <div class="menu-item dropdown dropdown-mobile-full">
         <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link" aria-expanded="false">
            <div class="menu-icon"><i class="bi bi-grid-3x3-gap nav-icon"></i></div>
         </a>
         <div class="dropdown-menu fade dropdown-menu-end w-300px text-center p-0 mt-1">
            <div class="row row-grid gx-0">
               <div class="col-4">
                  <a href="email_inbox.html" class="dropdown-item text-decoration-none p-3 bg-none">
                     <div class="position-relative">
                        <i class="bi bi-circle-fill position-absolute text-theme top-0 mt-n2 me-n2 fs-6px d-block text-center w-100"></i>
                        <i class="bi bi-envelope h2 opacity-5 d-block my-1"></i>
                     </div>
                     <div class="fw-500 fs-10px text-white">INBOX</div>
                  </a>
               </div>
               <div class="col-4">
                  <a href="pos_customer_order.html" target="_blank" class="dropdown-item text-decoration-none p-3 bg-none">
                     <div><i class="bi bi-hdd-network h2 opacity-5 d-block my-1"></i></div>
                     <div class="fw-500 fs-10px text-white">POS SYSTEM</div>
                  </a>
               </div>
               <div class="col-4">
                  <a href="calendar.html" class="dropdown-item text-decoration-none p-3 bg-none">
                     <div><i class="bi bi-calendar4 h2 opacity-5 d-block my-1"></i></div>
                     <div class="fw-500 fs-10px text-white">CALENDAR</div>
                  </a>
               </div>
            </div>
            <div class="row row-grid gx-0">
               <div class="col-4">
                  <a href="helper.html" class="dropdown-item text-decoration-none p-3 bg-none">
                     <div><i class="bi bi-terminal h2 opacity-5 d-block my-1"></i></div>
                     <div class="fw-500 fs-10px text-white">HELPER</div>
                  </a>
               </div>
               <div class="col-4">
                  <a href="settings.html" class="dropdown-item text-decoration-none p-3 bg-none">
                     <div class="position-relative">
                        <i class="bi bi-circle-fill position-absolute text-theme top-0 mt-n2 me-n2 fs-6px d-block text-center w-100"></i>
                        <i class="bi bi-sliders h2 opacity-5 d-block my-1"></i>
                     </div>
                     <div class="fw-500 fs-10px text-white">SETTINGS</div>
                  </a>
               </div>
               <div class="col-4">
                  <a href="widgets.html" class="dropdown-item text-decoration-none p-3 bg-none">
                     <div><i class="bi bi-collection-play h2 opacity-5 d-block my-1"></i></div>
                     <div class="fw-500 fs-10px text-white">WIDGETS</div>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <?php } ?>
      <div class="menu-item dropdown dropdown-mobile-full">
         <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
            <div class="menu-icon"><i class="bi bi-bell nav-icon"></i></div>
            <div class="menu-badge bg-theme"></div>
         </a>
         <div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
            <h6 class="dropdown-header fs-10px mb-1">NOTIFICATIONS</h6>
            <div class="dropdown-divider mt-1"></div>
            <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
               <div class="fs-20px">
                  <i class="bi bi-bag text-theme"></i>
               </div>
               <div class="flex-1 flex-wrap ps-3">
                  <div class="mb-1 text-white">NEW ORDER RECEIVED ($1,299)</div>
                  <div class="small">JUST NOW</div>
               </div>
               <div class="ps-2 fs-16px">
                  <i class="bi bi-chevron-right"></i>
               </div>
            </a>
            <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
               <div class="fs-20px w-20px">
                  <i class="bi bi-person-circle text-theme"></i>
               </div>
               <div class="flex-1 flex-wrap ps-3">
                  <div class="mb-1 text-white">3 NEW ACCOUNT CREATED</div>
                  <div class="small">2 MINUTES AGO</div>
               </div>
               <div class="ps-2 fs-16px">
                  <i class="bi bi-chevron-right"></i>
               </div>
            </a>
            <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
               <div class="fs-20px w-20px">
                  <i class="bi bi-gear text-theme"></i>
               </div>
               <div class="flex-1 flex-wrap ps-3">
                  <div class="mb-1 text-white">SETUP COMPLETED</div>
                  <div class="small">3 MINUTES AGO</div>
               </div>
               <div class="ps-2 fs-16px">
                  <i class="bi bi-chevron-right"></i>
               </div>
            </a>
            <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
               <div class="fs-20px w-20px">
                  <i class="bi bi-grid text-theme"></i>
               </div>
               <div class="flex-1 flex-wrap ps-3">
                  <div class="mb-1 text-white">WIDGET INSTALLATION DONE</div>
                  <div class="small">5 MINUTES AGO</div>
               </div>
               <div class="ps-2 fs-16px">
                  <i class="bi bi-chevron-right"></i>
               </div>
            </a>
            <a href="#" class="d-flex align-items-center py-10px dropdown-item text-wrap">
               <div class="fs-20px w-20px">
                  <i class="bi bi-credit-card text-theme"></i>
               </div>
               <div class="flex-1 flex-wrap ps-3">
                  <div class="mb-1 text-white">PAYMENT METHOD ENABLED</div>
                  <div class="small">10 MINUTES AGO</div>
               </div>
               <div class="ps-2 fs-16px">
                  <i class="bi bi-chevron-right"></i>
               </div>
            </a>
            <hr class="bg-white-transparent-5 mb-0 mt-2" />
            <div class="py-10px mb-n2 text-center">
               <a href="#" class="text-decoration-none fw-bold">SEE ALL</a>
            </div>
         </div>
      </div>
      <div class="menu-item dropdown dropdown-mobile-full">
         <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
            <div class="menu-img online">
               <img src="<?php echo getAssetsURL(); ?>img/user/default_white.png" height="65px" />
            </div>
            <div class="menu-text d-sm-block d-none"><?php echo $userinfo['username']; ?></div>
         </a>
         <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
            <a class="dropdown-item d-flex align-items-center" href="#">PROFILE <i class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
            <a class="dropdown-item d-flex align-items-center" href="#">INBOX <i class="bi bi-envelope ms-auto text-theme fs-16px my-n1"></i></a>
            <a class="dropdown-item d-flex align-items-center" href="#">CALENDAR <i class="bi bi-calendar ms-auto text-theme fs-16px my-n1"></i></a>
            <a class="dropdown-item d-flex align-items-center" href="#">SETTINGS <i class="bi bi-gear ms-auto text-theme fs-16px my-n1"></i></a>
            <?php if($usergroup['groupid'] == "1") { ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-flex align-items-center" href="admin/index.php">ADMINISTRATION <i class="fa fa-screwdriver-wrench ms-auto text-theme fs-16px my-n1"></i></a>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-flex align-items-center" href="<?php echo getAuthURL(); ?>logout.php">LOGOUT <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a>
         </div>
      </div>
   </div>
</div>
<div id="sidebar" class="app-sidebar">
   <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
      <div class="menu">
         <div class="menu-header">Navigation</div>
         <div class="menu-item">
            <a href="index.php" class="menu-link">
            <span class="menu-icon"><i class="fa fa-house"></i></span>
            <span class="menu-text">Dashboard</span>
            </a>
         </div>
         <div class="menu-item">
            <a href="device-map.php" class="menu-link">
            <span class="menu-icon"><i class="fa fa-server"></i></span>
            <span class="menu-text">Device Map</span>
            </a>
         </div>
         <div class="menu-item">
            <a href="status.php" class="menu-link">
            <span class="menu-icon"><i class="fa fa-map-location-dot"></i></span>
            <span class="menu-text">Service Status</span>
            </a>
         </div>
      </div>
      <?php if($usergroup['groupid'] == "1") { ?>
      <div class="p-3 px-4 mt-auto">
         <a href="admin/index.php" class="btn d-block btn-outline-theme">
         <i class="fa fa-screwdriver-wrench me-2 ms-n2 opacity-5"></i> Administration
         </a>
      </div>
      <?php } ?>
   </div>
</div>
<button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
