<?php

require_once "../inc/connect.php";

class Event {
    function __construct($sql) {
        global $connect, $row, $res;
        
        $result = $connect->query($sql);
        //$connect->close();
        if($result->num_rows == 0){
            $row = "";
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
            echo '<div class="card border-0 col-10 offset-1 col-md-6 offset-md-0 col-lg-3 mx-auto p-3">
            <div class="shadow rounded">
                <div class="imgContainer">
                    <img src="'.$row["img"].'" class="card-img-top d-none d-md-block" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">'.$row["name"].'</h5>
                    <p class="card-text">'.$row["description"].'</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-bold">
                        <a href="../pages/map.php?address='.$row['ZIP_code'].$row['street_name'].'">
                            <i class="fas fa-map-marked text-dark"></i><br>
                            <span class="font-weight-normal text-dark">'.$row["ZIP_code"].' ' .$row["city"].'<br>'.$row["street_name"].'</span>
                        </a>
                    </li>
                    <li class="list-group-item font-weight-bold">
                        <i class="fas fa-home"></i> 
                    <span class="font-weight-normal"><a href="'.$row['webadress'].'" class="text-dark">Web</a></span>
                    <li class="list-group-item font-weight-bold">
                        <i class="far fa-calendar"></i>
                        <span class="font-weight-normal">'.$row["event_date"].'</span>
                    </li>
                    <li class="list-group-item font-weight-bold">
                        <i class="far fa-clock"></i>
                        <span class="font-weight-normal">'.$row["event_time"].'</span>
                    </li>
                    <li class="list-group-item font-weight-bold">
                        <i class="far fa-money-bill-alt"></i>
                        <span class="font-weight-normal"> € '.$row["ticket_price"].'</span>
                    </li>
    
                    <li class="list-group-item text-muted">
                    updated: '. $row["last_update"].'
                    </li>';
           
                        if ( isset($_SESSION['admin' ])!="" ) {
    
                            echo "
                            <li class='list-group-item text-info text-center'>
                            <a href='../action/a_delete.php?id={$row["ID"]}&table=event' id='deleteBtn'><i class='fas fa-trash text-info mr-3'></i></a>
                            <a href='update.php?id={$row["ID"]}&table=event'><i class='fas fa-user-edit text-info'></i></a></li>";
                        }
                    echo       
                    '</ul>
                </div>
            </div>';
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