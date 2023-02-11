<?php
$driver = new mysqli_driver();
$driver->report_mode = MYSQLI_REPORT_STRICT;
    try {
        $con = mysqli_connect("147.189.175.243", "john", "johnpw", "john");
        http_response_code(200);
        return $con;
    } catch(Exception|Throwable|TypeError|mysqli_sql_exception|mysqli_connect_errno $e) {
        http_response_code(500);
        die("The connection to the database could not be established. Try again later!");
    }

    if(!isset($con)) {
        http_response_code(500);
        die("The connection to the database could not be established. Try again later!");
    }
?>