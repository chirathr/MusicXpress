<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */
$title="Music Express - Playlists";
if(session_id() == '') {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("src/static-includes.php"); ?>
</head>
<body>
<?php include('src/nav-bar.php'); ?>

<div class="container-fluid content">
    <?php
    $error = "";
    include("src/db-connect.php");

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($username)) {
        $username = $_SESSION["username"];

    }

    else {

    }
    ?>
</div>
</body>
</html>