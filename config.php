<?php

$DB_SERVER = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = 'rootadmin';
$DB_NAME = 'login2';


$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);


if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>