<?php
function checkUserBirthday($userinfobirthday) {
    $birthday = $userinfobirthday;
    $today = date("Y-m-d");
    $today_y = date("Y");
    $birthday_y = date('Y', strtotime($birthday));

    if($birthday == $today) {
        return true;
    } else {
        return false;
    }
}

function getUserAge($userinfobirthday) {
    $today = date("Y");
    $birthday = date('Y', strtotime($userinfobirthday));
    $age = ($today - $birthday);
    
    return $age;
}
?>