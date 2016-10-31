<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Music Express - SignUp</title>
    </head>
    <?php include('src/static-includes.php'); ?>
    </head>
    <body>
    <div class="container-fluid content">


    <?php include("src/nav-bar.php"); ?>
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
