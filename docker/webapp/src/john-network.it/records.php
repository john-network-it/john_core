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
    <title>RECORDS <?php echo getPageTitle(); ?></title>
    <?php include("../config/includes/header.php"); ?>
</head>
<body>
<div id="app" class="app">
<?php include("../config/includes/sidebar.user.php"); ?>
	<div id="content" class="app-content">
    	<ol class="breadcrumb">
      		<li class="breadcrumb-item"><a href="<?php echo getDefaultURL(); ?>">HOME</a></li>
      		<li class="breadcrumb-item active">RECORDS</li>
    	</ol>

        <div class="mb-sm-4 mb-3 d-sm-flex">
            <div class="mt-sm-0 mt-2"><a href="#" class="text-white text-opacity-75 text-decoration-none"><i class="fa fa-download fa-fw me-1 text-theme"></i> Export</a></div>
            <div class="ms-sm-4 mt-sm-0 mt-2"><a href="#" class="text-white text-opacity-75 text-decoration-none"><i class="fa fa-upload fa-fw me-1 text-theme"></i> Import</a></div>
            <div class="ms-sm-4 mt-sm-0 mt-2 dropdown-toggle">
                <a href="#" data-bs-toggle="dropdown" class="text-white text-opacity-75 text-decoration-none">More Actions</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>	
        
        <div class="card">
            <ul class="nav nav-tabs nav-tabs-v2 px-4" role="tablist">
                <li class="nav-item me-3" role="presentation">
                    <a href="#allTab" class="nav-link active px-2" data-bs-toggle="tab" aria-selected="true" role="tab">All</a>
                </li>
                <li class="nav-item me-3" role="presentation">
                    <a href="#publishedTab" class="nav-link px-2" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">Published</a>
                </li>
                <li class="nav-item me-3" role="presentation">
                    <a href="#expiredTab" class="nav-link px-2" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">Expired</a>
                </li>
                <li class="nav-item me-3" role="presentation">
                    <a href="#deletedTab" class="nav-link px-2" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">Deleted</a>
                </li>
            </ul>
            <div class="tab-content p-4">
                <div class="tab-pane fade show active" id="allTab" role="tabpanel">
                    <div class="input-group mb-4">
                        <button class="btn btn-outline-default dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter products &nbsp;</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                    <div class="flex-fill position-relative">
                        <div class="input-group">
                            <div class="input-group-text position-absolute top-0 bottom-0 bg-none border-0 pe-0" style="z-index: 1020;">
                                <i class="fa fa-search opacity-5"></i>
                            </div>
                            <input type="text" class="form-control ps-35px" placeholder="Search products">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="pt-0 pb-2"></th>
                                <th class="pt-0 pb-2">Product</th>
                                <th class="pt-0 pb-2">Inventory</th>
                                <th class="pt-0 pb-2">Type</th>
                                <th class="pt-0 pb-2">Vendor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-10px align-middle">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="product1">
                                        <label class="form-check-label" for="product1"></label>
                                    </div>
                                </td>   
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="w-50px h-50px bg-white bg-opacity-25 d-flex align-items-center justify-content-center">
                                            <img alt="" class="mw-100 mh-100" src="assets/img/product/product-6.jpg">
                                        </div>
                                        <div class="ms-3">
                                            <a href="page_product_details.html" class="text-white text-opacity-75 text-decoration-none">Force Majeure White T Shirt</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">83 in stock for 3 variants</td>
                                <td class="align-middle">Cotton</td>
                                <td class="align-middle">Force Majeure</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-md-flex align-items-center">
                    <div class="me-md-auto text-md-left text-center mb-2 mb-md-0">
                        Showing 1 to 10 of 57 entries
                    </div>
                    <ul class="pagination mb-0 justify-content-center">
                        <li class="page-item disabled"><a class="page-link">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
		<a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
	</div>
	<?php include("../config/includes/footer.php"); ?>
    <script src="<?php echo getAssetsURL()."records.js"; ?>" type="text/javascript"></script>
</body>
</html>
