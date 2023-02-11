<?php
    header("Content-Type: application/json; charset=UTF-8");
    
    include('../../config/Database.php');
    
    if(!isset($con)) {
        http_response_code(503);
        die("The connection to the database could not be established. Try again later!");
    }
    
    try {
        if(isset($_GET['service_id']) && $_GET['service_id'] == "all") {
	        $result = mysqli_query($con, "SELECT * FROM `john_services_monitor`");
            $results = mysqli_num_rows($result);
            if($results > 0) {
                $outArray = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $outArray[] = $row;
                }
                echo json_encode($outArray);
                http_response_code(200);
	            mysqli_close($con);
                die();
	        } else {
		        noRecord();
		    }
        }
        if(isset($_GET['service_id']) && $_GET['service_id'] != "") {
            $id = $_GET['service_id'];
	        $result = mysqli_query($con, "SELECT * FROM `john_services_monitor` WHERE id=$id");
            $results = mysqli_num_rows($result);
            if($results > 0) {
                $row = mysqli_fetch_array($result);
                $service_id = $row['id'];
                $name = $row['name'];
                $hostname = $row['hostname'];
                $ipv4 = $row['ipv4'];
                $port = $row['port'];
                $status = $row['status'];
                $last_check = $row['last_check'];
                response($service_id, $name, $hostname, $ipv4, $port, $status, $last_check);
                http_response_code(200);
	            mysqli_close($con);
                die();
	        } else {
		        noRecord();
		    }
        } else {
            invalidRequest();
	    }
    } catch(Exception|Throwable|TypeError $e) {
        http_response_code(503);
        die("An error occurred while querying the database. Try again later!");
    }

    function response($record_id, $name, $hostname, $ipv4, $port, $status, $last_check){
	    $response['id'] = $record_id;
	    $response['name'] = $name;
	    $response['hostname'] = $hostname;
	    $response['ipv4'] = $ipv4;
        $response['port'] = $port;
	    $response['status'] = $status;
	    $response['last_check'] = $last_check;
	
	    $json_response = json_encode($response);
	    echo $json_response;
    }
    function invalidRequest() {
        http_response_code(400);
        die();
    }
    function noRecord() {
        http_response_code(404);
        die();
    }
?>
