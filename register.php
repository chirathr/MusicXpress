<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */

$error = "";

$conn = pg_connect("host=localhost dbname=brittains_db user=brittains password=XXXX" );

$sql = "SELECT * FROM logins";
$result = pg_query($conn, $sql);

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $userName="";
    $password="";
}

else if($_SERVER["REQUEST_METHOD"] == "POST") {

    $userName=trim($_POST["userNameLogin"]);
    $password=trim($_POST["passwordLogin"]);

    if(pg_fetch_result($results, $userName, "userName")==true
        && pg_fetch_result($results, $password, "userName")==true) {
        setcookie("userIDforDV", $userName, time()+43200);
    }
    else {
        $error = "Your username and or password is incorrect";
    }

}

$userName = $_COOKIE['userIDforDV'];

if(isset($userName) && $userName!="") {
    echo "Welcome " . $userName;
}

echo $error;

?>