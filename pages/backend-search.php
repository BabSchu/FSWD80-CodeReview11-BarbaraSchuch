<?php
 
include_once "../inc/connect.php";
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement

    $search = $_REQUEST["term"];
    $sql = "SELECT 
    blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
    adress.ZIP_code,city.city, adress.street_name, 
    restaurant.tel_nr, restaurant.type_icon
    FROM restaurant
    INNER JOIN blogpost ON restaurant.fk_blogpost_ID=blogpost.ID
    INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
    INNER JOIN city ON adress.fk_city_ID=city.ID
    WHERE 
    `name` LIKE '$search%'";

    include_once "../inc/displayRestaurants.php";
    $obj = new Restaurant($sql);

    $sql1 = 
    "SELECT 
    blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
    adress.ZIP_code,city.city, adress.street_name, 
    e.event_date, e.event_time, e.ticket_price
    FROM `event` e
    INNER JOIN blogpost ON e.fk_blogpost_ID=blogpost.ID
    INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
    INNER JOIN city ON adress.fk_city_ID=city.ID
    WHERE blogpost.name LIKE '$search%'";

    include_once "../inc/displayEvents.php";
    $obj = new Event($sql1);

    $sql2 = 
    "SELECT 
    blogpost.ID, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
    adress.ZIP_code,city.city, adress.street_name, 
    todo.type
    FROM `todo`
    INNER JOIN blogpost ON todo.fk_blogpost_ID=blogpost.ID
    INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
    INNER JOIN city ON adress.fk_city_ID=city.ID
    WHERE 
    `name` LIKE '$search%'";

    include_once "../inc/displayTodo.php";
    $obj = new Todo($sql2);
    

    // if($stmt = $mysqli->prepare($sql)){
    //     $stmt->bind_param("s", $param_term);
    //     $param_term = $_REQUEST["term"] . '%';
        
    //     // Attempt to execute the prepared statement
    //     if($stmt->execute()){
    //         $result = $stmt->get_result();

    //         if($result->num_rows > 0){
    //             echo "<table class='table table-striped'>
    //             <thead>
    //                 <tr>
    //                   <th scope='col'></th>
    //                   <th scope='col'>Title</th>
    //                   <th scope='col'>Name</th>
    //                   <th scope='col'>Publisher</th>
    //                   <th scope='col'>Type</th>
    //                   <th scope='col'>Status</th>
    //                   <th scope='col'></th>
    //                   <th scope='col'></th>
    //                 </tr>
    //             </thead>";
    //             // Fetch result rows as an associative array
    //             while($row = $result->fetch_array(MYSQLI_ASSOC)){
    //                 echo "<tr><td>"
    //                 #. "<p class='d-none p-0 m-0'>".$row["id"]. "</></td><td>" 
    //                 . "<img src=". $row["img"]." width='85'/>". "</td><td>" 
    //                 . $row["title"]."<a href='detail.php?id={$row["ID"]}'><i class='fas fa-info-circle text-dark px-2'></i></a>". "</td><td>" 
    //                 . $row["author_firstname"]. " " 
    //                 . $row["author_lastname"]. "</td><td>" 
    //                 . "<a href='publisher.php?publisher_name={$row["publisher_name"]}'class='text-dark'>".$row["publisher_name"]. "</a></td><td>"
    //                 . $row["type"]. "</td><td>" 
    //                 . $row["status"]."</td><td>"; 
                    
                        
    //                     echo "<a href='../action/a_delete.php?id={$row["ID"]}'><i class='fas fa-trash text-dark'></i></a>"."</td><td>"
    //                     ."<a href='update.php?id={$row["ID"]}'><button type='button' class='btn btn-info'>Update</button></a>";
            
                
    //             "</td></tr>";
    //     }
    //     echo "</table>";
    //         } else{
    //             echo "<p>No matches found</p>";
    //         }
    //     } else{
    //         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    //     }
    // }
     
    // // Close statement
    // $stmt->close();
}
 
// Close connection
// $mysqli->close();
?>