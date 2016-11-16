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
                echo "Success";
            }
        }
        else{
            print_r($errors);
        }
        
    }   
?>
