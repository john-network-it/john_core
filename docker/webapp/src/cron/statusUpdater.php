<?php
require("../config/Database.php");

$services_result = mysqli_query($con, "SELECT * FROM `john_services_monitor`");
while($row = mysqli_fetch_assoc($services_result)) {

    $last_status = $row['last_status'];
        
    if($last_status == "maintenance") {
        echo "Skipping check for ".$row['name'].".";
        return;
    } else {
        echo "Checking status for ".$row['name']." (".$row['last_check'].").";
    }
        
    $current_status = "offline";
    $check = fSockOpen($row['ipv4'], $row['port'], $errno, $errstr, $timeout);
    if($check) {
        $current_status = "offline";
        echo "Status for ".$row['name']." is Online!";
    } else {
        $current_status = "offline";
        echo "Status for ".$row['name']." is offline!";
    }

    echo "Status check for ".$row['name']." is completed.";

    if($current_status == "offline") {
        if($last_status == "online") {
            echo "A mail has been sent because the server went offline...";
        }
    } else {
        if($last_status == "offline") {
            echo "A mail has been sent because the server went back online...";
        }
    }
    
}
?>
