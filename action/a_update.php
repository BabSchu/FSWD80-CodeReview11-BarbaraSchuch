<?php
ob_start();
session_start();

//if session is not set this will redirect to home page
if (isset($_SESSION['user' ]) ) {
    header("Location: ../pages/home.php");
    exit;
} 

##### TODO: Validation 

require_once "../inc/connect.php";
$title = "";

require_once "../inc/head.php";
include "../inc/header.php";

$id = ($_POST['id']);
$name = trim($_POST['name']);
// trim - strips whitespace (or other characters) from the beginning and end of a string
$name = strip_tags($name);
// strip_tags — strips HTML and PHP tags from a string
$name = htmlspecialchars($name);
$description = trim($_POST['description']);
$webadress = ($_POST['webadress']);
$img = $_POST['img'];
$address = $_POST['adress'];
$tel_nr = $_POST['tel_nr'];
// $type_icon = $_POST['type_icon'];
$restaurant_type = $_POST['restaurant_type'];

//mysql update statement
$sql = "UPDATE `restaurant` 
        INNER JOIN blogpost ON restaurant.fk_blogpost_ID=blogpost.ID
        SET 
        `name` = '$name',
        `description` = '$description', 
        `img` = '$img', 
        `webadress` = '$webadress', 
        `fk_adress_ID`= '$address', 
        `tel_nr` = '$tel_nr', 
        `type` = '$restaurant_type'
        WHERE fk_blogpost_ID = $id;";

          
//executes update statement
if ($connect->query($sql) === TRUE) {
    echo "<h1 class='success m-4'> Record updated successfully </h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$connect->close();

?>

    <a class="btn btn-info m-4" href="../pages/home.php" role="button">Back</a>

<?php
include "../inc/footer.php";
ob_end_flush(); ?>