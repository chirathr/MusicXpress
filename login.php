<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */
?>

<!DOCTYPE html>
<html lang="en">';

<?php

$error = "";

$connString = 'host=localhost port=5432 dbname=postgres user=postgres password=postgres';

$conn = pg_connect($connString);

if (!$conn) {
    echo "Connection error.\n";
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $username="";
    $password="";
    $title="Music Express - SignUp";
    include("src/static-includes.php");
    echo '<head>
            <meta charset="UTF-8">
        </head>
        <body>
        <form action="login.php" method="POST">
            <input name="username" placeholder="User name"/>
            <br>
            <input name="password" placeholder ="password" type="password"/>
            <br>
            <input type="submit"/>
        </form>
        </body>
        </html>';
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

$username = $_COOKIE['userIDforDV'];

if(isset($username) && $username!="") {
    echo "Welcome " . $username;
}

?>




