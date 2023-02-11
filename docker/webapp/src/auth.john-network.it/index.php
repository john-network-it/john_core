<?php
  $response_code = http_response_code();
  $title = "Unknown Error";
  $description = "The error message could not be processed";
  $additionalInformation = "";
  $help = false;
  $tryagain = false;

  if($response_code == "400") {
    $title = "Bad Request";
    $description = "The server was unable to process the request sent by the client due to invalid syntax";
    $additionalInformation = "";
    $help = true;
    $tryagain = true;
  }
  if($response_code == "401") {
    $title = "Connection unauthorized";
    $description = "The request could not be authenticated";
    $additionalInformation = "";
    $help = false;
    $tryagain = false;
  }
  if($response_code == "403") {
    $title = "Access forbidden";
    $description = "The page you are looking for is forbidden";
    $additionalInformation = "It seems you don't have the permission to access this file. Otherwise contact the administrator";
    $help = false;
    $tryagain = false;
  }
  if($response_code == "404") {
    $title = "Resource not found";
    $description = "The page you are looking for might have been removed, had its name changed or is temporarily unavailable";
    $additionalInformation = "";
    $help = true;
    $tryagain = true;
  }
  if($response_code == "500") {
    $title = "Internal Server Error";
    $description = "The server encountered an unexptected condition";
    $additionalInformation = "Please contact the administrator about this exception";
    $help = false;
    $tryagain = true;
  }
  if($response_code == "503") {
    $title = "Service unavailable";
    $description = "The server is not ready to handle the request";
    $additionalInformation = "Common causes are a server that is down for a maintenance or that is overloaded";
    $help = true;
    $tryagain = true;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<?php if($tryagain == true) { ?>
  <meta http-equiv="refresh" content="6"/>
<?php } ?>
<title>J.O.H.N.</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="https://assets.john-network.it/css/app.min.css" rel="stylesheet"/>
</head>
<noscript>AN ERROR OCCURED<br><br>Your browser does not support JavaScript!</noscript>
<body class='pace-top'>
  <div id="app" class="app app-full-height app-without-header">
    <div class="error-page">
      <div class="error-page-content">
        <div class="card mb-5 mx-auto" style="max-width: 320px;">
          <div class="card-body">
            <div class="card">
              <div class="error-code"><?php echo $response_code; ?></div>
              <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
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
      <h1><?php echo $title; ?></h1>
      <h3><?php echo $description; ?></h3>
    <?php if($additionalInformation != "") { echo "<p>".$additionalInformation."</p>"; } ?>
    <?php if($help == true) { ?>
      <p>Please try the following:
        <br>- Click the <strong>Back button</strong> to return to your previous page
        <br>- Refresh the page
        <br>- Check if you spelled the url correctly in the <strong>Address bar</strong>
      </p>
    <?php } ?>
      <?php if($tryagain == true) { ?>
        <p class="mb-1">
          <i class="fa fa-refresh fa-spin fa-fw"></i> Retrying (<span id="rc">0</span>s)...
        </p>
      <?php } ?>
      </p>
      <hr>
      <a href="javascript:window.history.back();" class="btn btn-outline-theme px-3 rounded-pill"><i class="fa fa-arrow-left me-1 ms-n1"></i> Go Back</a>
      <a href="https://auth.john-network.it/" class="btn btn-outline-theme px-3 rounded-pill"><i class="fa fa-home me-1 ms-n1"></i> Homepage</a>
    </div>
  </div>
</div>
<?php if($tryagain == true) { ?>
<script type="text/javascript">
  var timeleft = 5;
  var Timer = setInterval(function(){
    document.getElementById("rc").innerHTML = timeleft;
    if(timeleft < 0){
        clearInterval(Timer);
    }
    timeleft -= 1;
}, 1000);
</script>
<?php } ?>
</html>
