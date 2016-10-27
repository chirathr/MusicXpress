<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */

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

$username = $_COOKIE['userIDforDV'];

if(isset($username) && $username!="") {
    echo "Welcome " . $username;
}

echo $error;

?>