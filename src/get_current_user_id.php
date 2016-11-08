<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 8/11/16
 * Time: 6:28 PM
 */
$username = $_SESSION["username"];
$query = "select id from users where username = '" . $username . "';";
$result = pg_query($query);
if (!$result) {
    echo "db query error.\n";
    exit;
}
$userId = pg_fetch_row($result)[0];
?>