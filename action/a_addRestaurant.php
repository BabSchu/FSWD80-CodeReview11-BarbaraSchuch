<?php
ob_start();
session_start();

//if session is not set this will redirect to home page
if (isset($_SESSION['user' ]) ) {
    header("Location: ../pages/home.php");
    exit;
} 

### TODO: Validation
require_once "../inc/connect.php";
$title = " ";

require_once "../inc/head.php";
include "../inc/header.php";

$tel_nr = $_POST['tel_nr'];
$fk_blogpost_ID = $_POST['fk_blogpost_ID'];
$restaurant_type = $_POST['restuarantType'];
$eventDate = $_POST['event_date'];

$sqlRestaurant = "INSERT INTO `restaurant`
(`type`, `tel_nr`,`fk_blogpost_ID`) 
VALUES ('$restaurant_type','$tel_nr','$fk_blogpost_ID')";

if ($connect->query($sqlRestaurant) === TRUE) {
    echo "<h1 class='text-center m-5'> New record created successfully </h1>";
} else {
    echo "Error: " . $sqlRestaurant . "<br>" . $connect->error;
}

$connect->close();
?>
    <div class="d-flex justify-content-center pb-4">
        <a class="btn btn-info m-5" href="../pages/addEntry.php" role="button">New Blogpost</a>
        <a class="btn btn-outline-info m-5" href="../pages/home.php" role="button">Home</a>
    </div>
