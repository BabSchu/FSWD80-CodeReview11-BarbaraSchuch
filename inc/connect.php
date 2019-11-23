<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr11_barbaraschuch_travelmatic";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// printf("Initial character set: %s\n", $conn->character_set_name());

/* change character set to utf8 */

if (!$connect->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $connect->error);
    exit();
} else {
    $connect->character_set_name();
    //printf( $connect->character_set_name());
}