<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 4/11/16
 * Time: 11:56 AM
 */
$title="New Playlist";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("../src/static-includes.php"); ?>
</head>
<body>
<?php include('../src/nav-bar.php'); ?>

<div class="container-fluid content">
    <?php

    $error = "";
    include("../src/db-connect.php");
    $username = $_COOKIE['userIDforDV'];

    if($_SERVER["REQUEST_METHOD"] == "GET" && !isset($username)) {
        $username="";
        $password="";
        include("playlist-form.php");
    }

    else if($_SERVER["REQUEST_METHOD"] == "POST") {

        $username=trim($_POST["username"]);
        $password=trim($_POST["password"]);


        $query = "SELECT id FROM users WHERE username = '$username' AND password = '$password';";
        $result = pg_query($conn, $query);
        if (!$result) {
            echo "db query error.\n";
            exit;
        }

        if(pg_num_rows($result) != 1) {
            // do error stuff
            $error = "Your username and or password is incorrect";
        } else {
            // user logged in
            setcookie("userIDforDV", $username, time()+43200);
            echo "<h1> you are logged in </h1>";
        }
    }

    if(isset($username) && $username!="") {
        echo "Welcome " . $username;
    }

    ?>
</div>
</body>
</html>




