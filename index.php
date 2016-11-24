<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <?php
    if(session_id() == '') {
        session_start();
    }
    include("src/static-includes.php"); ?>
    <style>
        .clickabe {
            cursor: pointer;
        }
    </style>
</head>
<body class="">
<section class="vbox">
    <?php include("src/nav-bar.php") ?>
    <section>
        <section class="hbox stretch"> <!-- .aside -->
            <?php include("src/side-bar-left.php") ?><!-- /side bar -->


            <section id="content">
                <section class="hbox stretch">
                    <section>
                        <?php include("content.php") ?>
                    </section> <!-- side content -->
                    <?php include("src/side-bar-right.php") ?>
                    <a href="index.html#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open"
                       data-target="#nav,html"></a>
                </section>
            </section>

        </section>
    </section>
</section> <!-- Bootstrap --> <!-- App -->
<script src="js/app.v1.js"></script>
<script src="js/app.plugin.js"></script>
<script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="js/jPlayer/music_express_player.js"></script>
<?php
            $query = "SELECT name, artistname, songart, filepath FROM songs where id in (select songid from playlistsongs where playlistid =" .$_GET['playlistid'] .")";
            $q = pg_query($conn, $query);
            while($r = pg_fetch_row($q)){
                echo '<script>'. "addSong('" . $r[0] . "', '" . $r[1] . "' ,'" . $r[2] . "', '" . $r[3] . "');" ."</script>";
            }
?>
</body>
</html>