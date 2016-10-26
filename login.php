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


    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "db query error.\n";
        //exit;
    }

    $arr = pg_fetch_all($result);

    print_r($arr);
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

echo $error;

?>