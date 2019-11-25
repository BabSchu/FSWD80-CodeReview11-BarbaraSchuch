<?php

require_once "../inc/connect.php";

$sql2 = 
"SELECT 
blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
adress.ZIP_code,city.city, adress.street_name, 
todo.type
FROM `todo`
INNER JOIN blogpost ON todo.fk_blogpost_ID=blogpost.ID
INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
INNER JOIN city ON adress.fk_city_ID=city.ID;";

// if(isset($_REQUEST["term"])){
//     // Prepare a select statement
//     $sql2 = "SELECT 
//     blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
//     adress.ZIP_code,city.city, adress.street_name, 
//     todo.type
//     FROM `todo`
//     INNER JOIN blogpost ON todo.fk_blogpost_ID=blogpost.ID
//     INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
//     INNER JOIN city ON adress.fk_city_ID=city.ID;
//     `name` LIKE ?";
//     }

$result2 = $connect->query($sql2);

if($result2->num_rows == 0){
    $row = "No result2";
    $res2 = 0;
} elseif($result2->num_rows == 1){
    $row = $result2->fetch_assoc();
    $res2 = 1;
} else{
    $row = $result2->fetch_all(MYSQLI_ASSOC);
    $res2 = 2;
}



class Todo {
    function __construct() {
        global $connect, $row, $res2;

        if($res2 == 0){
            echo $row;
        }elseif($res2 == 1){
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
                        <a href="../pages/map.php?address='.$value['ZIP_code'].$value['street_name'].'">
                            <i class="fas fa-map-marked text-dark"></i><br>
                            <span class="font-weight-normal text-dark">'.$value["ZIP_code"].' ' .$value["city"].'<br>'.$value["street_name"].'</span>
                        </a>
                    </li>
                    <li class="list-group-item font-weight-bold">
                        <i class="fas fa-home"></i> 
                    <span class="font-weight-normal"><a href="'.$row['webadress'].'" class="text-dark">Web</a></span>
                    <li class="list-group-item font-weight-bold">
                        <i class="fas fa-hashtag"></i>
                        <span class="font-weight-normal">'.$row["type"].'</span>
                    </li>
                    <li class="list-group-item text-muted">
                    updated: '. $row["last_update"].'
                    </li>';
           
                        if ( isset($_SESSION['admin' ])!="" ) {
    
                            echo "
                            <li class='list-group-item text-info text-center'>
                            <a href='../action/a_delete.php?id={$row["ID"]}&table=todo'><i class='fas fa-trash text-info mr-3'></i></a>
                            <a href='update.php?id={$row["ID"]}&table=todo'><i class='fas fa-user-edit text-info'></i></a></li>";
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
                    <i class="fas fa-map-marked"></i><br>
                    <span class="font-weight-normal">'.$value["ZIP_code"].' ' .$value["city"].'<br>'.$value["street_name"].'</span>
                </li>
                <li class="list-group-item font-weight-bold">
                    <i class="fas fa-home"></i> 
                <span class="font-weight-normal"><a href="'.$value['webadress'].'" class="text-dark">Web</a></span>
                <li class="list-group-item font-weight-bold">
                    <i class="fas fa-hashtag"></i>
                    <span class="font-weight-normal">'.$value["type"].'</span>
                </li>
                <li class="list-group-item text-muted">
                updated: '. $value["last_update"].'
                </li>';
       
                    if ( isset($_SESSION['admin' ])!="" ) {

                        echo "
                        <li class='list-group-item text-info text-center'>
                        <a href='../action/a_delete.php?id={$value["ID"]}&table=todo'><i class='fas fa-trash text-info mr-3'></i></a>
                        <a href='update.php?id={$value["ID"]}&table=todo'><i class='fas fa-user-edit text-info'></i></a></li>";
                    }
                echo       
                '</ul>
            </div>
        </div>';
        
            }
        }   
// $connect->close();
    }
}

?>