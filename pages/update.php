<?php
ob_start();
session_start();

//if session is not set this will redirect to home page
if (isset($_SESSION['user' ]) ) {
    header("Location: ../pages/home.php");
    exit;
} 

##### TODO: Validation 

$title = "Update";

require_once "../inc/head.php";
include "../inc/header.php";
require_once "../inc/connect.php";

if(isset($_GET["id"])){
  $id = $_GET["id"];
  $sql = 
  "SELECT 
    blogpost.name, blogpost.name, blogpost.img, blogpost.description, blogpost.webadress, blogpost.last_update, 
    adress.ZIP_code,city.city, adress.street_name, 
    restaurant.tel_nr, restaurant.type_icon
    FROM restaurant
    INNER JOIN blogpost ON restaurant.fk_blogpost_ID=blogpost.ID
    INNER JOIN adress ON blogpost.fk_adress_ID=adress.ID
    INNER JOIN city ON adress.fk_city_ID=city.ID
    ;";
  $result = $connect->query($sql);
  $row = $result->fetch_assoc();
}
$id = $_GET['id'];

// echo "<h1 class='text-danger'>".$row['status']."</h1>";
// echo $row['type'];
?>
    <div class="container-fluid my-5">
        <form method="POST" action="../action/a_update.php"> 
            <div class="form-group m-5 row">
                <label class="col-sm-2 col-form-label"for="id">ID</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="id" name="id" readonly value="<?php echo $id ?>">
                <label class="col-sm-2 col-form-label">Name</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="name" name="name" placeholder="name" value="<?php echo $row['name'] ?>">
                <label class="col-sm-2 col-form-label">Street Name</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="street_name" name="street_name" placeholder="street_name" value="<?php echo $row['street_name'] ?>">
                <label class="col-sm-2 col-form-label">ZIP Code</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="ZIP_code" name="ZIP_code" placeholder="Firstname" value="<?php echo $row['ZIP_code'] ?>">
                <label class="col-sm-2 col-form-label">Tel. Nr.</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="tel_nr" name="tel_nr" placeholder="+43 664 123456" value="<?php echo $row['tel_nr'] ?>">
                <label class="col-sm-2 col-form-label">Webadress</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="webadress" name="webadress" placeholder="webadress" value="<?php echo $row['webadress'] ?>">
                <label class="col-sm-2 col-form-label">Restaurant Type Icon</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="type_icon" name="type_icon" value="<?php echo $row['type_icon'] ?>" placeholder="Vegan">
                <label class="col-sm-2 col-form-label">Restaurant Type</label>
                <select class="form-control col-sm-10 mb-4" id="restaurant_type" name="restaurant_type" value="<?php echo $row['restaurant_type'] ?>">
                    <option>vegan</option>
                    <option>vegetarian</option>
                    <option>veg-option</option>
                </select>
                <!-- <select type="text" class="form-control" name="author">
                            <?php
                                while ($row = mysqli_fetch_assoc($result_authors)) {
                                    echo "<option ";
                                    if ($id<>"") if ($item['author_id']==$row['author_id']) echo "selected='selected' ";
                                    echo "value=" . $row['author_id'] . ">" . $row['last_name'] . ", " . $row['first_name'] . "</option>";
                                }
                            ?>
                        </select> -->
                <label class="col-sm-2 col-form-label">Image URL</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="img" name="img" value="<?php echo $row['img'] ?>" placeholder="https://cdn.pixabay.com/photo/2016/09/10/17/18/book-1659717_1280.jpg">
                <label class="col-sm-2 col-form-label">Description</label>
                <input type="text" class="form-control col-sm-10 mb-4" id="description" name="description" placeholder="Description" value="<?php echo $row['description'] ?>">
        
            </div>
            <div class="d-flex justify-content-center">
                <Input type="submit" class="btn btn-info mx-2 mb-5" value="Enter">
                <button type="reset" class="btn btn-outline-info mx-2 mb-5">Reset</button>
            </div>
        </form>
    </div>
<?php
include "../inc/footer.php";
ob_end_flush(); ?>
