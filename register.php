<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */

$error = "";

$connString = 'port=5432 dbname=musicexpress user=music password=password';

$conn = pg_connect($connString);



//$sql = "SELECT * FROM logins";
//$result = pg_query($conn, $sql);

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $username="";
    $password="";
}

else if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username=trim($_POST["userNameLogin"]);
    $password=trim($_POST["passwordLogin"]);

//    if(pg_fetch_result($results, $userName, "userName")==true
//        && pg_fetch_result($results, $password, "userName")==true) {
//        setcookie("userIDforDV", $userName, time()+43200);
//    }
//    else {
//        $error = "Your username and or password is incorrect";
//    }
    $query = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password');";
    $result = pg_query($conn, $query);
    if(pg_num_rows($result) != 1) {
        // do error stuff
        $error = "Your username and or password is incorrect";
    } else {
        // user logged in
        setcookie("userIDforDV", $userName, time()+43200);
    }

}

$userName = $_COOKIE['userIDforDV'];

if(isset($userName) && $userName!="") {
    echo "Welcome " . $userName;
}

echo $error;

?>