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
    header('Location: ./login.php');
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

include('src/db-connect.php');

$username = $_COOKIE['userIDforDV'];

if($_SERVER["REQUEST_METHOD"] == "GET" && !isset($username)) {
    $username="";
    $password="";

    echo '<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Music <span>Xpress</span></span></h1>
		</div>
		<form action="register.php" method="POST">
			<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>SignUp In</h2>
				</div>
				<label for="fullname">Full Name</label>
				<br/>
				<input name="fullname" type="text" id="username">
				<br/>
				<label for="username">Username</label>
				<br/>
				<input name="username" type="text" id="username">
				<br/>
				<label for="email">Email</label>
				<br/>
				<input name="email" type="text" id="username">
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

else if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username=trim($_POST["username"]);
    $password=trim($_POST["password"]);
    $fullname=trim($_POST["fullname"]);
    $email=trim($_POST["email"]);


    $query = "SELECT id FROM users WHERE username = '$username' OR email = '$email';";
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "db query error.\n";
        exit;
    }

    if(pg_num_rows($result) == 0) {
        $query = "SELECT max(id) FROM users;";
        $result = pg_query($conn, $query);
        if (!$result) {
            echo "db query error.\n";
            exit;
        }
        $row = pg_fetch_row($result);
        $nextId = $row[0] + 1;
        $query = "INSERT INTO USERS VALUES($nextId, '$username', '$fullname', '$email', '$password');";
        $result = pg_query($conn, $query);
        if (!$result) {
            echo "db query error.\n";
            exit;
        }
    }
    else {
        echo "<h1>User already exists !</h1>";
    }
}

echo $error;

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