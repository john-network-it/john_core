<?php
require("appInformation.php");
require("Database.php");
require("sqlFunctions.php");
require("userFunctions.php");

function shortenText($string, $minWords, $maxWords) {
    $shortText = substr($string, $minWords, $maxWords);
    $original_length = strlen($string);
    $short_length = strlen($shortText);
    
    if($short_length < $original_length) {
        $shortText .= "...";
    }

    return $shortText;
}
?>