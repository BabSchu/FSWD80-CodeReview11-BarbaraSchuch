<?php
ob_start();
session_start();

//if session is not set this will redirect to home page
if (isset($_SESSION['user' ]) ) {
    header("Location: ../pages/home.php");
    exit;
} 

##### TODO: Validation 
##### TODO: fix -> type and status are not updated

require_once "../inc/connect.php";
$title = "";

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
$ZIP_code = $_POST['ZIP_code'];
$city = $_POST['city'];
$street_name = $_POST['street_name'];
$tel_nr = $_POST['tel_nr'];
$type_icon = $_POST['type_icon'];
$restaurant_type = $_POST['restaurant_type'];

//mysql update statement
$sql = "UPDATE `restaurant` 
        SET 
            `name` = '$name',
            `description` = '$description', 
            `img` = '$img', 
            `webadress` = '$webadress', 
            `ZIP_code`= '$ZIP_code', 
            `city` = '$city', 
            `street_name` = '$street_name', 
            `tel_nr` = '$tel_nr', 
            `type_icon` = '$type_icon', 
            `restaurant_type` = '$restaurant_type', 
        WHERE
            `ID` = $id";

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

            

//executes update statement
if ($connect->query($sql) === TRUE) {
    echo "<h1 class='success m-4'> Record updated successfully </h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();

### Using JS to redirect after 5 sec.

// echo
// "<script>
// setTimeout(function () {
//     window.location.href= 'insert.php';
// }, 5000);
// </script>"

#### Using PHP to redirect immediatly
//header('location: insert.php');
?>

    <a class="btn btn-info m-4" href="../pages/home.php" role="button">Back</a>

<?php
include "../inc/footer.php";
ob_end_flush(); ?>