<?php
ob_start();
session_start();

//if session is not set this will redirect to home page
if (isset($_SESSION['user' ]) ) {
    header("Location: ../index.php");
    exit;
} 

### TODO: Validation
require_once "../inc/connect.php";
$title = "a_addEntry";

require_once "../inc/head.php";
include "../inc/header.php";

$name = trim($_POST['name']);
// trim - strips whitespace (or other characters) from the beginning and end of a string
$name = strip_tags($name);
// strip_tags — strips HTML and PHP tags from a string
$name = htmlspecialchars($name);
$description = trim($_POST['description']);
$webadress = ($_POST['webadress']);
$img = $_POST['img'];
$adress = $_POST['adress'];

$sqlBlogpost = "INSERT INTO `blogpost`
(`name`, `description`, `img`, `webadress`,fk_adress_ID) 
VALUES ('$name','$description','$webadress','$img','$adress')";

if ($connect->query($sqlBlogpost) === TRUE) {
    echo "<h1 class='text-center m-5'> New record created successfully </h1>";
} else {
    echo "Error: " . $sqlBlogpost . "<br>" . $connect->error;
}

?>

    <div class="d-flex justify-content-center pb-4">
        <a class="btn btn-info m-5" href="../pages/addEntry.php" role="button">New Blogpost</a>
        <a class="btn btn-outline-info m-5" href="../pages/home.php" role="button">Home</a>
    </div>

<?php

function getRestaurantType(){
    global $connect;
    $restaurantType = "SELECT `ID`, `type` FROM `restaurant`";      
    $result = $connect->query($restaurantType);    
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    $option = "";    
      foreach ($rows as $row) {    
        $option .= '<option value="'.$row['ID']. " - ".'">';    
        $option .= $row['type'];    
        $option .= '</option>';
      }
    
      echo $option;
}

function getBlogpost(){
    global $connect;
    $blogpost = "SELECT `ID`, `name` FROM `blogpost`";      
    $result = $connect->query($blogpost);    
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    $option = "";    
      foreach ($rows as $row) {    
        $option .= '<option value="'.$row['ID']. " - ".'">';    
        $option .= $row['name'];    
        $option .= '</option>';
      }
    
      echo $option;
}

?>

<div class="container-fluid my-4">
    <form method="POST" action="../action/a_addRestaurant.php"> 
        <!-- <h3>Insert Restaurantdetails</h3> -->
        <div class="form-group m-5 row">
            <label class="col-sm-2 col-form-label" for="restuarantType">Blogpost</label>
            <select type="text" name="fk_blogpost_ID" class="form-control col-sm-10 mb-4" id="fk_blogpost_ID">
            <?php getBlogpost(); ?>
            </select>
            <label class="col-sm-2 col-form-label">Telephone Nr</label>
            <input type="text" class="form-control col-sm-10 mb-4" id="description" name="tel_nr" placeholder="tel_nr" value="">
            <label class="col-sm-2 col-form-label" for="restuarantType">Restaurant Type</label>
            <select type="text" name="restuarantType" class="form-control col-sm-10 mb-4" id="restuarantType">
            <?php getRestaurantType(); ?>
            </select>
        </div>
        <div class="d-flex justify-content-center pb-4">
            <button type="submit" class="btn btn-info mx-2">Enter</button>
            <button type="reset" class="btn btn-outline-info mx-2">Reset</button>
        </div>
    </form>
</div>


<?php
$connect->close();
?>

<?php
include "../inc/footer.php";
ob_end_flush(); 
?>