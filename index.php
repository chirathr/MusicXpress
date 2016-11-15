<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    if(session_id() == '') {
        session_start();
    }                                                                                                                                                                       include("src/static-includes.php"); ?>
</head>
<body>

    <?php include("src/nav-bar.php"); ?>

    <div class="container-fluid content">
        <?php 
	    if($_GET['page'] == 'music'){
		include("src/music.php");
	    }
	?>
    </div>
</body>
</html>


