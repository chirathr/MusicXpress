<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */
$title="Music Express - Playlists";
if(session_id() == '') {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("src/static-includes.php"); ?>
</head>
<body>
<?php include('src/nav-bar.php'); ?>

<div class="container-fluid content">
    <?php

    $error = "";
    include("src/db-connect.php");

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($username)) {
        $username="";
        $password="";
        if($_SESSION['username']){
            $username = $_SESSION["username"];
        }
        else{
            echo '
        	<form action="login.php" method="POST">
            	<input name="username" placeholder="User name"/>
            	<br>
            	<input name="password" placeholder ="password" type="password"/>
            	<br>
            	<input type="submit"/>
        	</form>';
        }
    }

    else {

    }
    ?>
</div>
</body>
</html>