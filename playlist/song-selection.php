<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 4/11/16
 * Time: 12:07 PM
 */
?>

<?php
    include("../src/db-connect.php");
    $query = "SELECT * from songs";
    $result = pg_query($conn, $query);
    if (!$result) {
        echo "db query error.\n";
        exit;
    }
    while($row = pg_fetch_row($result)) {
        echo '<p><input type="checkbox" name="songList[]" value="' . $row[0] . '"/> - ' . $row[1] .
            '<img style="height:50px; margin-left: 20px;" src="' . $row[3] . '"></p>';
    }
?>
