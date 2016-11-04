<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 4/11/16
 * Time: 11:58 AM
*/
?>
<form action="../add-playlist.php" method="POST"">
    <input name="playListName" placeholder="Name"/>
    <br>
    <?php
        include('song-selection.php');
    ?>
    <input type="submit"/>
</form>
