<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 26/10/16
 * Time: 8:47 PM
 */
$title="Music Express - login";
if(session_id() == '') {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'> 

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/nav-bar.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>

<div class="nav-bar">

</div>

<?php

$error = "";
include("src/db-connect.php");

if($_SERVER["REQUEST_METHOD"] == "GET" && !isset($username)) {
    $username="";
    $password="";
    if($_SESSION['username']){
        $username = $_SESSION["username"];
    	echo '
        	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Music<span>Xpress</span></span></h1>
		</div>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>Upload</h2>
				</div>
				<label for="username">upload</label>
				<br/>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<br/>
				<input type="submit" value="Upload Song" name="submit">
				<br/>
				<a href="index.php"><p >Return</p></a>
			</div>
		</form>
	</div>';
    }
}

else if($_SERVER["REQUEST_METHOD"] == "POST") {
    include('src/db-connect.php');
    require("getid3/getid3.php");
    $getID3 = new getID3;   
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    if (isset($_FILES['fileToUpload'])){
        $errors= array();
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size =$_FILES['fileToUpload']['size'];
        $file_tmp =$_FILES['fileToUpload']['tmp_name'];
        $file_type=$_FILES['fileToUpload']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
        if($file_ext !== 'mp3'){
            echo '<script>alert("Only .mp3 files can be uploaded.");</script>';
            exit(0);
        }
        if(empty($errors)==true){
            if(move_uploaded_file($file_tmp,"music/".$file_name)){
                //print_r($ThisFileInfo);   
                $query = "SELECT max(id) FROM songs;";
                $result = pg_query($conn, $query);
                if (!$result) {
                    echo "db query error.\n";
                    //exit;
                }
                $row = pg_fetch_row($result);
                $nextId = $row[0] + 1;
                $filepath = "music/".$file_name;
                $ThisFileInfo = $getID3->analyze($filepath);
                //echo $ThisFileInfo['audio']['dataformat'];
                //echo $ThisFileInfo['playtime_string'];
                $name = $ThisFileInfo['filename'];
                $artist = $ThisFileInfo['tags']['id3v2']['artist'][0];
                $genre = $ThisFileInfo['tags']['id3v2']['genre'][0];
                $im = $ThisFileInfo['comments']['picture'][0]['data'];
                $gd = (imagecreatefromstring($im));
                $path = "img/music/".$nextId.".png";
                if(!$gd){
                    $path = "";
                }
                imagepng($gd, $path);
                $query = "INSERT INTO songs VALUES($nextId, '$name', '$artist' ,'$path', '$genre', '$filepath');";
                $result = pg_query($conn, $query);
                if(!$result) {
                    echo "db query error.\n";
                    exit;
                }
                else{
                    echo '<script>alert("Upload Successful!!");
                    window.location.replace("index.php");
                    </script>';
                }
            }
        }
        else{
            print_r($errors);
        }
    }
}

?>
</body>

<script>
    $(document).ready(function () {
        $("input:text:visible:first").focus();
    });
    $('#username').focus(function() {
        $('label[for="username"]').addClass('selected');
    });
    $('#username').blur(function() {
        $('label[for="username"]').removeClass('selected');
    });
    $('#password').focus(function() {
        $('label[for="password"]').addClass('selected');
    });
    $('#password').blur(function() {
        $('label[for="password"]').removeClass('selected');
    });
</script>
</html>




