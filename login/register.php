<?php
ob_start();
session_start(); // start a new session or continues the previous

include_once '../inc/connect.php'; #require_once 'filename'; 
$error = false;

if (isset($_POST['btn-signup'])) {

    // sanitize user input to prevent sql injection
    $name = trim($_POST['name']);
    # $name = $_POST["name"]

    // trim - strips whitespace (or other characters) from the beginning and end of
    // a string
    $name = strip_tags($name);

    // strip_tags — strips HTML and PHP tags from a string
    $name = htmlspecialchars($name);

    // htmlspecialchars converts special characters to HTML entities
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    // basic name validation
    if (empty($name)) {
        $error = true;
        $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3) {
        $error = true;
        $nameError = "Name must have at least 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $nameError = "Name must contain alphabets and space.";
    }

    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        # $result - >num_rows;
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }

    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
    }

    // Password validation
	// could also do: '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m';
	
	// if ( empty($pass) ) {
	// 	$error = true;
	// 	/*$passError = "Please enter a password.";*/
	// 	$errors[] = "Please enter a password.";
	// } 
	// if ( strlen($pass) < 6 ) {
	// 	$error = true;
	// 	/*$passError = "Password must have at least 6 characters.";*/
	// 	$errors[] = "Password must have at least 6 characters.";
	// } 
	// if ( !preg_match("/\d/", $pass) ) {
	// 	$error = true;
	// 	/*$passError = "Password must contain at least 1 digit.";*/
	// 	$errors[] = "Password must have at least 1 digit.";
	// } 
	// if ( !preg_match("/[A-Z]/", $pass) ) {
	// 	$error = true;
	// 	/*$passError = "Password must contain at least 1 capital letter.";*/
	// 	$errors[] = "Password must contain at least 1 capital letter.";
	// } 
	// if ( !preg_match("/[a-z]/", $pass) ) {
	// 	$error = true;
	// 	/*$passError = "Password must contain at least 1 small letter.";*/
	// 	$errors[] = "Password must contain at least 1 small letter.";
	// } 
	// if ( !preg_match("/\W/", $pass) ) {
	// 	$error = true;
	// 	/*$passError = "Password must contain at least 1 special character.";*/
	// 	$errors[] = "Password must contain at least 1 special character.";
	// } 
	// if ( preg_match("/\s/", $pass) ) {
	// 	$error = true;
	// 	/*$passError = "Password must not contain any white spaces.";*/
	// 	$errors[] = "Password must not contain any white spaces.";
	// }


    // password hashing for security
    $password = hash('sha256', $pass);

    // if there's no error, continue to signup
    if (!$error) {
        $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
        $res = mysqli_query($connect, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            unset($name);
            unset($email);
            unset($pass);
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
        }
    }
}

$title = "Sign up";
$quote = "";
include_once "../inc/head.php";
include_once "../inc/header.php";
?>
      <div class="col-sm-4 offset-4 p-5">
         <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" >
            <h2>Sign Up.</h2>
            <hr/>
               
            <?php
               if ( isset($errMSG) ) {
            ?>
               
            <div  class="alert alert-<?php echo $errTyp ?>" >
            
            <?php echo  $errMSG; ?>
            </div>

            <?php          
            }
            ?>
               
            <input type="text" name="name" class="form-control my-3" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>"/>
            <span class="text-danger">
            <?php echo $nameError; ?>
            </span >

            <input type="email" name="email" class="form-control my-3" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>"/>
            <span class="text-danger">
            <?php echo $emailError; ?>
            </span >

            <input type="password" name="pass" class="form-control my-3" placeholder="Enter Password" maxlength="15"/> <span class="text-danger">
            <span class="text-danger">
            <?php echo $passError; ?>
            </span >

            <hr/>

            <button type="submit" class="btn btn-block btn-info" name="btn-signup">Sign Up</button >
            <hr/>
            <div class="d-flex flex-column align-items-center">

                <span class="text-dark mr-3">You have already an account?</span>
                <a href="login.php"><button type="button" class="btn btn-outline-info mt-4">Sign in Here</button></a>
            </div>
         </form >
      </div>

<?php  

include_once "../inc/footer.php";
ob_end_flush(); 

?>