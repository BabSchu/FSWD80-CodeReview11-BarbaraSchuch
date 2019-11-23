<?php

require_once "../inc/connect.php";

class Event {
    function __construct() {
        global $connect, $row, $res;
        $sql = 
        "SELECT 
        blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
        adress.ZIP_code,city.city, adress.street_name, 
        e.event_date, e.event_time, e.ticket_price
        FROM `event` e
        INNER JOIN blogpost ON e.fk_blogpost_ID=blogpost.ID
        INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
        INNER JOIN city ON adress.fk_city_ID=city.ID
        ;";
        $result = $connect->query($sql);
        //$connect->close();
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
                    <i class="fas fa-map-marked"></i><br>
                    <span class="font-weight-normal">'.$value["ZIP_code"].' ' .$value["city"].'<br>'.$value["street_name"].'</span>
                </li>
                <li class="list-group-item font-weight-bold">
                    <i class="fas fa-home"></i> 
                <span class="font-weight-normal"><a href="'.$value['webadress'].'" class="text-dark">Web</a></span>
                <li class="list-group-item font-weight-bold">
                    <i class="far fa-calendar"></i>
                    <span class="font-weight-normal">'.$value["event_date"].'</span>
                </li>
                <li class="list-group-item font-weight-bold">
                    <i class="far fa-clock"></i>
                    <span class="font-weight-normal">'.$value["event_time"].'</span>
                </li>
                <li class="list-group-item font-weight-bold">
                    <i class="far fa-money-bill-alt"></i>
                    <span class="font-weight-normal"> € '.$value["ticket_price"].'</span>
                </li>

                <li class="list-group-item text-muted">
                updated: '. $value["last_update"].'
                </li>';
       
                    if ( isset($_SESSION['admin' ])!="" ) {

                        echo "
                        <li class='list-group-item text-info text-center'>
                        <a href='../action/a_delete.php?id={$value["ID"]}&table=event' id='deleteBtn'><i class='fas fa-trash text-info mr-3'></i></a>
                        <a href='update.php?id={$value["ID"]}&table=event'><i class='fas fa-user-edit text-info'></i></a></li>";
                    }
                echo       
                '</ul>
            </div>
        </div>';
            }
        } 
    }
}

?>