<?php
 
include_once "../inc/connect.php";
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM blogpost WHERE 
    `name` LIKE ?";

    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("s", $param_term);
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                echo "<table class='table table-striped'>
                <thead>
                    <tr>
                      <th scope='col'></th>
                      <th scope='col'>Title</th>
                      <th scope='col'>Name</th>
                      <th scope='col'>Publisher</th>
                      <th scope='col'>Type</th>
                      <th scope='col'>Status</th>
                      <th scope='col'></th>
                      <th scope='col'></th>
                    </tr>
                </thead>";
                // Fetch result rows as an associative array
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    echo "<tr><td>"
                    #. "<p class='d-none p-0 m-0'>".$row["id"]. "</></td><td>" 
                    . "<img src=". $row["img"]." width='85'/>". "</td><td>" 
                    . $row["title"]."<a href='detail.php?id={$row["ID"]}'><i class='fas fa-info-circle text-dark px-2'></i></a>". "</td><td>" 
                    . $row["author_firstname"]. " " 
                    . $row["author_lastname"]. "</td><td>" 
                    . "<a href='publisher.php?publisher_name={$row["publisher_name"]}'class='text-dark'>".$row["publisher_name"]. "</a></td><td>"
                    . $row["type"]. "</td><td>" 
                    . $row["status"]."</td><td>"; 
                    
                        
                        echo "<a href='../action/a_delete.php?id={$row["ID"]}'><i class='fas fa-trash text-dark'></i></a>"."</td><td>"
                        ."<a href='update.php?id={$row["ID"]}'><button type='button' class='btn btn-info'>Update</button></a>";
            
                
                "</td></tr>";
        }
        echo "</table>";
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    $stmt->close();
}
 
// Close connection
$mysqli->close();
?>