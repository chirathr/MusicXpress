<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */

$error = "";

$connString = 'host=localhost port=5432 dbname=musicexpress user=music password=password';

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

//    if(pg_fetch_result($results, $userName, "userName")==true
//        && pg_fetch_result($results, $password, "userName")==true) {
//        setcookie("userIDforDV", $userName, time()+43200);
//    }
//    else {
//        $error = "Your username and or password is incorrect";
//    }
    //$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
    $sql = "SELECT * FROM users";
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "db query error.\n";
        exit;
    }

    $arr = pg_fetch_all($result);

    print_r($arr);

    echo pg_num_rows($result);
    if(pg_num_rows($result) != 1) {
        // do error stuff
        $error = "Your username and or password is incorrect";
    } else {
        // user logged in
        setcookie("userIDforDV", $userName, time()+43200);
        echo "<h1> you are logged in </h1>";
    }
}

$userName = $_COOKIE['userIDforDV'];

if(isset($userName) && $userName!="") {
    echo "Welcome " . $userName;
}

echo $error;

?>