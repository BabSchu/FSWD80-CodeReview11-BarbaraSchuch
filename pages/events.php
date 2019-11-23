<?php
ob_start();
session_start();
//include database for media
require_once "../inc/connect.php";
$title = "Vienna";
$quote = "Dream on, but don't imagine they'll all come true. When will you realize... Vienna waits for you.
-- Billy Joel";
require_once "../inc/head.php";
include_once "../inc/header.php";
include_once "../inc/search_login_bar.php";

?>

    <div class="row m-0 p-1">

<!---record from database--->

<?php

include_once "../inc/displayEvents.php";
$obj = new Event();

include_once "../inc/displayTodo.php";
$obj = new Todo();

$connect->close();
?>
    </div><!---row end--->
    
<?php 
include_once "../inc/footer.php";
ob_end_flush(); ?>

