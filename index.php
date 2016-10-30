<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("src/static-includes.php"); ?>
</head>
<body>

<?php include("src/nav-bar.php"); ?>

<?php
    $username = $_COOKIE['userIDforDV'];

    if(isset($username) && $username!="") {
        echo $username;
    }
    else {
        echo "you are not logged in";
    }
?>
</body>
</html>


