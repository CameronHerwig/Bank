<?php
// Do not change the following two lines.
$teamURL = dirname($_SERVER['PHP_SELF']) . DIRECTORY_SEPARATOR;
$server_root = dirname($_SERVER['PHP_SELF']);

$dbhost = 'localhost';
$dbname = 'cherwig2012';   // Needs to be changed to your designated table database name
$dbuser = 'cherwig2012';   // Needs to be changed to reflect your LAMP server credentials
$dbpass = 'maYHZ8TT9y'; // Needs to be changed to reflect your LAMP server credentials

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}
