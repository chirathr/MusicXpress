<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    if(session_id() == '') {
        session_start();
    }                                                        
    include("src/static-includes.php"); ?>
</head>
<body>
    <?php include("src/nav-bar.php"); ?>

    <?php include("src/side-bar-left.php"); ?>

    <?php include("src/side-bar-right.php"); ?>

    <?php include("content.php"); ?>

    <?php include("src/player.php"); ?>
</body>
</html>


