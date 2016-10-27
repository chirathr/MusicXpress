<?php
    $username = $_COOKIE['userIDforDV'];

    if(isset($username) && $username!="") {
        echo "Welcome " . $username;
    }
    else {
        echo "you are not logged in";
    }
?>

