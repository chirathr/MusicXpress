<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */
$title="Music Express - login";
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

if($_SERVER["REQUEST_METHOD"] == "GET" && !isset($username)) {
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
	$_SESSION["username"] = $username;
	echo "<h1> you are logged in </h1>";
    }
}
else{
    if($_GET['logout'] === 'set'){
        session_unset();
        session_destroy();
        header('Location: ./login.php');
    }	
}

if(isset($username) && $username!="") {
    echo "Welcome " . $_SESSION['username'];
}

?>
</div>
</body>
</html>




