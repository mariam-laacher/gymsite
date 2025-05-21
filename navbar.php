<?php
function nav()
{
    /*
    $home = "";
    $price = "";
    $coach = "";
    $admin = "";
    if ($page == "home"){
        $home = active;
    }elseif ($page == "price"){
        $price = "active";
    }elseif ($page == "coach"){
        $coach = "active";
    }elseif ($page == "admin"){
        $admin = "active";
    }*/
    echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">PEGAZUP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="http://localhost/pegazup/index.php">Home</a>
            <a class="nav-item nav-link" href="http://localhost/pegazup/payement/pricing.php">Pricing</a>
            <a class="nav-item nav-link" href="http://localhost/pegazup/payement/coaching.php">Coaching</a>
            <a class="nav-item nav-link disabled" href="#">ADMIN</a>
        </div>
    </div>';

    if (isset($_SESSION["fname"])){
        echo '<h5 style="position: relative;right: 5%;">'.$_SESSION["fname"].'</h5>';
    }else{
        echo '<a class="nav-item nav-link" href="http://localhost/pegazup/login.php">LOGIN</a>';
    }

echo '</nav>;';
}

