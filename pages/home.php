<?php
ob_start();
session_start();
require_once "../inc/connect.php";
$title = "Vienna";
$quote = "Dream on, but don't imagine they'll all come true. When will you realize... Vienna waits for you.
-- Billy Joel";
require_once "../inc/head.php";
include_once "../inc/header.php";
include_once "../inc/search_login_bar.php";
?>

    <div class="row m-0 p-1 display">

<!---record from database--->

<?php

//display Events
$sql = 
"SELECT 
blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
adress.ZIP_code,city.city, adress.street_name, 
e.event_date, e.event_time, e.ticket_price
FROM `event` e
INNER JOIN blogpost ON e.fk_blogpost_ID=blogpost.ID
INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
INNER JOIN city ON adress.fk_city_ID=city.ID";

include_once "../inc/displayEvents.php";
$obj = new Event($sql);

//display Todo

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

//display Restaurant

$sql3 = 
"SELECT 
blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
adress.ZIP_code,city.city, adress.street_name, 
restaurant.tel_nr, restaurant.type_icon
FROM restaurant
INNER JOIN blogpost ON restaurant.fk_blogpost_ID=blogpost.ID
INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
INNER JOIN city ON adress.fk_city_ID=city.ID
;";

include_once "../inc/displayRestaurants.php";
$obj = new Restaurant($sql3);
$connect->close();
?>
    </div><!---row end--->
    
<?php 
include_once "../inc/footer.php";
ob_end_flush(); ?>

