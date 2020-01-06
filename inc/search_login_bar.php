<?php
##TODO: Try Catch better
if (isset($_SESSION['admin'])){
    $res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
} elseif (isset($_SESSION['user'])){
    $res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
} else {}

?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="search-box form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" autocomplete="off" placeholder="Search Name..." />
            <button class="btn btn-info my-2 my-sm-0" type="submit"><i class="fas fa-search searchButton"></i></button>
        </div>
        <div class="form-inline  my-2 my-lg-0">
            <?php echo ( isset($_SESSION['admin' ])!="" ) ? 
            "<a href='addEntry.php' class='d-flex text-light'>
            <button class='btn btn-outline-info my-2 my-sm-0 mx-2' type=#button'>
                <i class='fas fa-plus-square mr-2'></i>Add Blogpost</button>
            </a>" : '';?>
        </div>
    </div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle ml-2 ml-lg-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user userIcon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <div class="mr-4">
                <?php
                if ( isset($_SESSION['user' ])!="" ) {

                    ?>
                    <a class='dropdown-item' href='#'>You are signed in as
                    
                    <?=$userRow['userName']?>

                    </a>
                    <div class='dropdown-divider'></div>
                    <a class='dropdown-item' href='../action/logout.php?logout'>Sign Out</a>

                    <?php

                } elseif ( isset($_SESSION['admin' ])!="" ){
                    ?>
                    <a class='dropdown-item' href='#'>You are signed in as 
                        <span class="text-info font-weight-bold">                    
                        <?=$userRow['role']?>
                        </span>
                    </a>
                    <div class='dropdown-divider'></div>
                    <a class='dropdown-item' href='../action/logout.php?logout'>Sign Out</a>

                    <?php
                    } else {
                    echo "<a class='dropdown-item' href='../pages/login.php'>Sign In</a>";
                    }
                    ?>
                    </div>
                </div>
            </li>
        </ul>  
    </nav>