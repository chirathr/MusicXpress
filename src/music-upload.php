<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select Music to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
    
</body>
</html>

<?php
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
            echo '<script>alert("File other than .mp3 cant be uploaded.");</script>';
            exit(0);
        }
        if(empty($errors)==true){
            if(move_uploaded_file($file_tmp,"music/".$file_name)){
                //print_r($ThisFileInfo);   
                $query = "SELECT max(id) FROM songs;";
                $result = pg_query($conn, $query);
                if (!$result) {
                    echo "db query error.\n";
                    exit;
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
                imagepng($gd, $path);
                $query = "INSERT INTO songs VALUES($nextId, '$name', '$artist' ,'$path', '$genre', '$filepath');";
                $result = pg_query($conn, $query);
                if (!$result) {
                    echo "db query error.\n";
                    exit;
                }
                else{
                    echo '<script>alert("Upload Successful!!")</script>';
                }
            }
        }
        else{
            print_r($errors);
        }
    }   
?>
