<?php
    function sqlQuery($con, $query) {
        try {
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            return $row;
        } catch(Exception|Throwable|TypeError $e) {
            http_response_code(503);
            die("An error occurred while querying the database. Try again later!");
        }
    }
    
    function sqlCount($con, $query) {
        try {
            $result = mysqli_query($con, $query);
            $results = mysqli_num_rows($result);
            return $results;
        } catch(Exception|Throwable|TypeError $e) {
            http_response_code(503);
            die("An error occurred while querying the database. Try again later!");
        }
    }
?>