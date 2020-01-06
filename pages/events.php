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

$sql = 
"SELECT 
blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
adress.ZIP_code,city.city, adress.street_name, 
e.event_date, e.event_time, e.ticket_price
FROM `event` e
INNER JOIN blogpost ON e.fk_blogpost_ID=blogpost.ID
INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
INNER JOIN city ON adress.fk_city_ID=city.ID";

$obj = new Event($sql);

$sql2 = 
"SELECT 
blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
adress.ZIP_code,city.city, adress.street_name, 
todo.type
FROM `todo`
INNER JOIN blogpost ON todo.fk_blogpost_ID=blogpost.ID
INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
INNER JOIN city ON adress.fk_city_ID=city.ID;";

include_once "../inc/displayTodo.php";
$obj = new Todo($sql2);

$connect->close();
?>
    </div><!---row end--->
    
<?php 
include_once "../inc/footer.php";
ob_end_flush(); ?>

