<?php
ob_start();
session_start();

//if session is not set this will redirect to home page
if (isset($_SESSION['user' ]) ) {
    header("Location: ../pages/home.php");
    exit;
} 
require_once "../inc/connect.php";
$title = "Delete";

require_once "../inc/head.php";
include "../inc/header.php";
?>
    <div class="text-center m-5">
    <?php 
        if(isset($_GET["id"]) && ($_GET["table"])){
            $id = $_GET["id"];
            $table = $_GET["table"];
            echo $table;
            echo $sql = "DELETE FROM `$table` WHERE fk_blogpost_ID = $id";
            if(mysqli_query($connect ,$sql)){
                echo "<h1 class='text-danger'>Record Deleted from Restaurant</h1> 
                <a href='../pages/home.php'><button type='button' class='btn btn-info mt-4'>Back</button></a>";
            }
            $sql2 = "DELETE FROM `blogpost` WHERE ID = $id";
            if(mysqli_query($connect ,$sql2)){
                echo "<h1 class='text-danger'>Record Deleted from Blogpost</h1> 
                <a href='../pages/home.php'><button type='button' class='btn btn-info mt-4'>Back</button></a>";
            }
        }

    ?>
    </div>

<?php
include "../inc/footer.php";
ob_end_flush(); 
?>