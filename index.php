<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <?php
    if(session_id() == '') {
        session_start();
    }
    include("src/static-includes.php"); ?>
</head>
<body class="">
<section class="vbox">
    <?php include("src/nav-bar.php") ?>
    <section>
        <section class="hbox stretch"> <!-- .aside -->
            <?php include("src/side-bar-left.php") ?><!-- /side bar -->
            <?php include("content.php") ?>
        </section>
    </section>
</section> <!-- Bootstrap --> <!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/app.plugin.js"></script>
<script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="js/jPlayer/demo.js"></script>
</body>
</html>