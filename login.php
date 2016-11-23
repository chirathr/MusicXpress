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
$username = $_SESSION["username"];
if($_GET['logout'] === 'set'){
    session_unset();
    session_destroy();
    echo '<script>alert("Logout successfull!");
        window.location.replace("index.php");
    </script>';
    die();
}
if(isset($username) && $username!="") {
    echo '<script>alert("You are already logged in!");
        window.location.replace("index.php");
    </script>';
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/nav-bar.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>

<div class="nav-bar">

</div>

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
        	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Music <span>Xpress</span></span></h1>
		</div>
		<form action="login.php" method="POST">
			<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>Log In</h2>
				</div>
				<label for="username">Username</label>
				<br/>
				<input name="username" type="text" id="username">
				<br/>
				<label for="password">Password</label>
				<br/>
				<input name="password" type="password" id="password">
				<br/>
				<button type="submit">Sign In</button>
				<br/>
				<a href="#"><p class="small">Forgot your password?</p></a>
			</div>
		</form>
	</div>';
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
	    echo '<script>alert("Login successful!");
            window.location.replace("index.php");
        </script>';
        die();
    }
}

?>
</body>

<script>
    $(document).ready(function () {
        $("input:text:visible:first").focus();
    });
    $('#username').focus(function() {
        $('label[for="username"]').addClass('selected');
    });
    $('#username').blur(function() {
        $('label[for="username"]').removeClass('selected');
    });
    $('#password').focus(function() {
        $('label[for="password"]').addClass('selected');
    });
    $('#password').blur(function() {
        $('label[for="password"]').removeClass('selected');
    });
</script>
</html>




