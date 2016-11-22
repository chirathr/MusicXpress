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


    echo '
    <form action="register.php" method="POST">
        <input name="fullname" placeholder="Full name"/>
        <br>
        <input name="username" placeholder="User name"/>
        <br>
        <input name="email" placeholder="Email Id" type="email"/>
        <br>
        <input name="password" placeholder ="password" type="password"/>
        <br>
        <input type="submit"/>
    </form>';
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
        setcookie("userIDforDV", $username, time()+43200);
        echo "<h1>Welcome $username, you are now logged in.</h1>";
    }
    else {
        echo "<h1>User already exists !</h1>";
    }
}

if(isset($username) && $username!="") {
    echo "Welcome " . $username;
}

echo $error;

?>
    </div>
    </body>
</html>
