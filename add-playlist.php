<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 4/11/16
 * Time: 11:56 AM
 */
$title="New Playlist";
if(session_id() == '') {
    session_start();
}
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
    $username = $_SESSION['username'];

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($username)) {
        $username="";
        $password="";
        include("playlist/playlist-form.php");
    }

    else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($username)) {
        $query = "select id from users where username = '" . $username . "';";
        $result = pg_query($query);
        if (!$result) {
            echo "db query error.\n";
            exit;
        }
        $userId = pg_fetch_row($result)[0];
        $playListName = trim($_POST["playListName"]);
        $songList = trim($_POST["songList"]);
        $query = "select * from playlists where name = '" . $playListName ."'";
        $result = pg_query($query);
        if (!$result) {
            echo "db query error.\n";
            exit;
        }
        if(pg_num_rows($result) == 0) {
            if(!empty($_POST['songList'])) {
                foreach($_POST['songList'] as $check) {
                    $query = "select max(id) from playlists";
                    $result = pg_query($query);
                    if(!$result) {
                        echo pg_last_error($conn);
                        echo "query failed.\n";
                        exit;
                    }
                    $row = pg_fetch_row($result)[0];

                    $row =  $row + 1;
                    $query = "insert into playlists values(" . $row .", '" . $playListName . "')";
                    $result = pg_query($query);
                    if(!$result) {
                        echo pg_last_error($conn);
                        echo "Saving playlist failed.\n";
                        exit;
                    }
                    echo $songList;
                    $query = "insert into playlistSongs values('" . $row . "', '" . $userId . "', '" .$songList . "', 0)";
                    echo $query;

                    $result = pg_query($query);
                    if(!$result) {
                        echo pg_last_error($conn);
                        echo "Saving playlist failed.\n";
                        exit;
                    }
                    else
                        echo "Playlist created sucessfully";
                }
            }
            else
                echo "You haven't selected any songs";
        }
        else
            echo "The playlist already exists";

        
    }else {
        echo "Please log in";
    }
    ?>
</div>
</body>
</html>




