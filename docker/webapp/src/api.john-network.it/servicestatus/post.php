<?php
    header("Content-Type: application/json; charset=UTF-8");

    include('../../config/Database.php');

    if(!isset($con)) {
        http_response_code(503);
        die("The connection to the database could not be established. Try again later!");
    }

    try {
        if(isset($_GET['name']) && isset($_GET['hostname']) && isset($_GET['ipv4']) && isset($_GET['port']) && isset($_GET['token'])) {
            $name = $_GET['name'];
            $hostname = $_GET['hostname'];
            $ipv4 = $_GET['ipv4'];
            $port = $_GET['port'];
            $token = $_GET['token'];

	        $token_query = mysqli_query($con, "SELECT * FROM `john_api_tokens` WHERE `token`=$token");
            $token_result = mysqli_num_rows($token_query);
            if($token_result == 1) {
                $service_query = mysqli_query($con, "SELECT * FROM `john_services_monitor` WHERE `name`='$name'");
                $service_result = mysqli_num_rows($service_query);
                if($service_result == 0) {
                    $query = mysqli_query($con, "INSERT INTO `john_services_monitor`(`name`, `hostname`, `ipv4`, `port`) VALUES ('$name','$hostname','$ipv4','$port')");
                    finish();
                } else {
                    alreadyExists();
                }
	        } else {
		        wrongToken();
		    }
            mysqli_close($con);
        } else {
            invalidRequest();
        }
    } catch(Exception|Throwable|TypeError $e) {
        http_response_code(503);
        die("An error occurred while querying the database. Try again later!");
    }

    function invalidRequest() {
        http_response_code(400);
        die();
    }

    function wrongToken() {
        http_response_code(403);
        die();
    }

    function alreadyExists() {
        http_response_code(409);
        die();
    }

    function finish() {
        http_response_code(201);
        $response['code'] = "201";
        $response['message'] = "Created";
        echo json_encode($response);
        die();
    }
?>
