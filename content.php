<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 16/11/16
 * Time: 9:47 PM
 */
?>

<div class="content">
    <div class="container-fluid content">
        <?php
        if($_GET['page'] == 'music'){
            include("src/music-upload.php");
        }
        ?>
    </div>
</div>
