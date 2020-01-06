<?php
ob_start();
session_start();

require_once '../inc/connect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: ../pages/home.php");
 exit;
}

if ( isset($_SESSION['admin' ])!="" ) {
  header("Location: ../pages/home.php");
  exit;
 }

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }elseif(strlen($pass) < 5){
  $error = true;
  $passError = "Must be more than 5 char";
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($connect, "SELECT userId, userName, userPass, role FROM users WHERE userEmail='$email'" );
  var_dump($res);
  echo "<br>";
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  var_dump($row);
  echo "<br>";
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row  $res->num_rows
  var_dump($count);
  echo "<br>";
 
  if( $count == 1 && $row['userPass']==$password ) {
    if($row["role"] == "admin"){
      $_SESSION["admin"]= $row["userId"];
      header("Location: ../pages/home.php");
      exit;
    } else{
      $_SESSION['user'] = $row['userId'];
      header( "Location: ../pages/home.php");
    }
   
  } else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 }
}

include_once "../inc/head.php";
include_once "../inc/header.php";
$title = "Login";
?>

<body>
<div class="col-sm-4 offset-4 p-5">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
    <h2>Sign In.</h2 >
    <hr/>
           
  <?php
  if ( isset($errMSG) ) echo $errMSG; 
  ?>
    <input type="email" name="email" class="form-control  my-3" placeholder= "Your Email" value="<?php echo $email; ?>" maxlength="40"/>
    <span class="text-danger"><?php echo $emailError; ?></span >
    <input type="password" name="pass" class="form-control  my-3" placeholder ="Your Password" maxlength="15"/>
    <span class="text-danger"><?php echo $passError; ?></span>
    <hr/>
    <button type="submit" class="btn btn-block btn-info" name="btn-login">Sign In</button >
    <hr/>
    <div class="d-flex flex-column align-items-center">
      <span class="text-dark mr-3">You don't have an account?</span>
        <a href="register.php">
      <button type="button" class="btn btn-outline-info mt-4">Sign up Here</button>
    </a>
    </div>
     
  </form>
</div>
</body>
</html>
<?php 
ob_end_flush(); 
include_once "../inc/footer.php";
?>