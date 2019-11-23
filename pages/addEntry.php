<?php
ob_start();
session_start();

//if session is not set this will redirect to home page
if (isset($_SESSION['user' ]) ) {
    header("Location: ../pages/home.php");
    exit;
} 
require_once "../inc/connect.php";
$title = "Add";

require_once "../inc/head.php";
include "../inc/header.php";

function getAdress(){
    global $connect;
    $adress = "SELECT ID,street_name,ZIP_code FROM `adress` ";      
    $result = $connect->query($adress);    
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    $option = "";

      foreach ($rows as $row) {    
        $option .= '<option value="'.$row['ID'].'">';    
        $option .= $row['street_name']." - ";
        $option .= $row['ZIP_code'];     
        $option .= '</option>';
      }
    
      echo $option;
}

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
        <form method="POST" action="../action/a_addEntry.php"> 
        <h3>Insert Blogpost</h3>
        <div class="form-group m-5 row">
            <label class="col-sm-2 col-form-label"for="id">ID</label>
            <input type="text" class="form-control col-sm-10 mb-4" id="id" name="id" readonly value="">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <input type="text" class="form-control col-sm-10 mb-4" id="name" name="name" placeholder="Restaurant/Event/Place Name" value="">
            <!-- <label class="col-sm-2 col-form-label">Street Name</label>
            <input type="text" class="form-control col-sm-10 mb-4" id="street_name" name="street_name" placeholder="street_name" value=""> -->
            
            <label class="col-sm-2 col-form-label" for="adress">Adress</label>
            <select type="text" name="adress" class="form-control col-sm-10 mb-4" id="adress">
                <?php getAdress(); ?>
            </select>
            <label class="col-sm-2 col-form-label">Webadress</label>
            <input type="text" class="form-control col-sm-10 mb-4" id="webadress" name="webadress" placeholder="webadress" value="">
            <label class="col-sm-2 col-form-label">Image URL</label>
            <input type="text" class="form-control col-sm-10 mb-4" id="img_url" name="img_url" value="" placeholder="https://cdn.pixabay.com/photo/2016/09/10/17/18/book-1659717_1280.jpg">
            <label class="col-sm-2 col-form-label">Description</label>
            <input type="text" class="form-control col-sm-10 mb-4" id="description" name="description" placeholder="Description" value="">
                
        </div>
            <div class="d-flex justify-content-center pb-4">
                <button type="submit" class="btn btn-info mx-2">Enter</button>
                <button type="reset" class="btn btn-outline-info mx-2">Reset</button>
            </div>
        <!-- </form>
                <label class="col-sm-2 col-form-label">Event Date</label>
                <input type="datetime-local" class="form-control col-sm-10 mb-4" id="event_date" name="event_date">
            </div>
            <div class="d-flex justify-content-center pb-4">
                <button type="submit" class="btn btn-info mx-2">Enter</button>
                <button type="reset" class="btn btn-outline-info mx-2">Reset</button>
            </div>
        </form> -->

<?php
$connect->close();
?>

</div>
<?php
include "../inc/footer.php";
ob_end_flush(); 
?>
