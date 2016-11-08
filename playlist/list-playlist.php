<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 8/11/16
 * Time: 6:35 PM
 */
?>
<div class="col-sm-2 col-xs-4">
    <?php
        $query = "select * from songs where id = " . $playlist[1] . ";";
        $song = pg_fetch_row(pg_query($query));
    ?>
    <div id="tile3" class="tile">
        <img src="<?php if($song[3])echo $song[3]; else echo 'img/default.jpg'; ?>" class="img-responsive"/>
        <p style="text-align:center;"><?php echo $playlist[0]; ?></p>
    </div>
</div>