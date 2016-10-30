<?php
/**
 * Created by PhpStorm.
 * User: chirath
 * Date: 30/10/16
 * Time: 1:31 PM
 */

$connString = 'host=localhost port=5432 dbname=postgres user=postgres password=postgres';

$conn = pg_connect($connString);

if (!$conn) {
    echo "Connection error.\n";
    exit;
}