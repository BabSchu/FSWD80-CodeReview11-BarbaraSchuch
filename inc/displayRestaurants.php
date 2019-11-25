<?php

require_once "../inc/connect.php";

$sql = 
"SELECT 
blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
adress.ZIP_code,city.city, adress.street_name, 
restaurant.tel_nr, restaurant.type_icon
FROM restaurant
INNER JOIN blogpost ON restaurant.fk_blogpost_ID=blogpost.ID
INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
INNER JOIN city ON adress.fk_city_ID=city.ID
;";
$result = $connect->query($sql);

if($result->num_rows == 0){
    $row = "No result";
    $res = 0;
} elseif($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $res = 1;
} else{
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $res = 2;
}

class Restaurant {
    function __construct() {
        global $connect, $row, $res;

        if($res == 0){
            echo $row;
        }elseif($res == 1){
            echo $row["name"]." ". $row["description"];
        }else{
            foreach ($row as $value) {
        echo '<div class="card border-0 col-10 offset-1 col-md-6 offset-md-0 col-lg-3 mx-auto p-3">
        <div class="shadow rounded">
            <div class="imgContainer">
                <img src="'.$value["img"].'" class="card-img-top d-none d-md-block" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">'.$value["name"].'</h5>
                <p class="card-text">'.$value["description"].'</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item font-weight-bold">
                <a href="../pages/map.php?address='.$value['ZIP_code'].$value['street_name'].'">
                    <i class="fas fa-map-marked text-dark"></i><br>
                    <span class="font-weight-normal text-dark">'.$value["ZIP_code"].' ' .$value["city"].'<br>'.$value["street_name"].'</span>
                </a>
                </li>
                <li class="list-group-item font-weight-bold">
                        <i class="fas fa-tty"></i></i><span class="font-weight-normal"> '. $value["tel_nr"].'</span>
                    </li>
                    <li class="list-group-item font-weight-bold">
                    <i class="fas fa-home"></i> 
                    <span class="font-weight-normal"><a href="'.$value['webadress'].'" class="text-dark">Web</a></span>
                    <li class="list-group-item font-weight-bold text-center">
                    <img src="'.$value["type_icon"].'" alt="">
                    </li>
                    <li class="list-group-item text-muted">
                    updated: '. $value["last_update"].'
                    </li>';
       
                    if ( isset($_SESSION['admin' ])!="" ) {

                        echo "
                        <li class='list-group-item text-info text-center'>
                        <a href='../action/a_delete.php?id={$value["ID"]}&table=restaurant'><i class='fas fa-trash text-info mr-3'></i></a>
                        <a href='update.php?id={$value["ID"]}'><i class='fas fa-user-edit text-info'></i></a></li>";
                    }
                echo       
                '</ul>
            </div>
        </div>';
    
            }
        }
        //$connect->close();
    }
}

?>