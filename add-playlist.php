<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 4/11/16
 * Time: 11:56 AM
 */
$title="New Playlist";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("src/static-includes.php"); ?>
<body>
<?php include('src/nav-bar.php'); ?>

<div class="container-fluid content">
    <?php

    $error = "";
    include("src/db-connect.php");
    $username = $_COOKIE['userIDforDV'];

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($username)) {
        $username="";
        $password="";
        echo "Hello";
        include("playlist/playlist-form.php");
    }

    else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($username)) {

        $playListName = trim($_POST["playListName"]);
        $songList = trim($_POST["songList"]);

        foreach($songList as $songId){
            $query = "SELECT id FROM songs where id = '$songId';";
            $result = pg_query($conn, $query);
            if (!$result) {
                echo "db query error.\n";
                exit;
            }

        }
    }else {
        echo "Please log in";
    }

    ?>
</div>
</body>
</html>




