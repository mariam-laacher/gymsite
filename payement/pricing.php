<?php

include("../config.php");
if (!isUserConnected()) {
    header('Location: ../login.php');
}


if (isset($_POST['submit'])){

    $_SESSION['price'] = $_POST['price'];
    header('Location: pay.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../ownstyle/priceItems.css" />

</head>
<body>
<!--NAVBAR-->
<?php
include "../navbar.php";
nav();
?>

<!--PRICING-->
<section class="pricing py-5">
    <div class="container">
        <div class="row">
            <!-- Free Tier -->
            <div class="col-lg-4">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Light</h5>
                        <h6 class="card-price text-center">$20<span class="period">/month</span></h6>
                        <hr>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Access to basic gym facilities</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Standard gym equipment usage</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Limited access to group fitness classes</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>General locker room access</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>NULL</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>NULL</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>NULL
                            </li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>NULL</li>
                        </ul>
                        <div class="d-grid">
                            <form method="post">
                                <input type="hidden" name="price" value="20">
                                <input class="btn btn-primary text-uppercase" name="submit" type="submit" value="JOIN NOW"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Plus Tier -->
            <div class="col-lg-4">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Plus</h5>
                        <h6 class="card-price text-center">$40<span class="period">/month</span></h6>
                        <hr>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Access to all gym facilities</strong></li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Full gym equipment usage</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited access to group fitness classes</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Access to special fitness workshops</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Enhanced locker room amenities</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>NULL</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>NULL</li>
                            <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>NULL</li>
                        </ul>
                        <div class="d-grid">
                            <form method="post">
                                <input type="hidden" name="price" value="40">
                                <input class="btn btn-primary text-uppercase" name="submit" type="submit" value="JOIN NOW"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pro Tier -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
                        <h6 class="card-price text-center">$70<span class="period">/month</span></h6>
                        <hr>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Priority access to all gym facilities</strong>
                            </li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Exclusive use of premium gym equipment</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited access to all group fitness classes, including specialized classes</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Access to personal training sessions</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>additional services</strong> Free
                                Subdomains</li>
                            <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
                        </ul>
                        <div class="d-grid">
                            <form method="post">
                                <input type="hidden" name="price" value="70">
                                <input class="btn btn-primary text-uppercase" name="submit" type="submit" value="JOIN NOW"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</body>
</html>
