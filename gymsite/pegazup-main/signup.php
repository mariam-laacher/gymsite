<?php
include("config.php");
if (isUserConnected()){
    header('Location: index.php');
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PegazUp Signup</title>
        <style>
            .mbody {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 200%;
            }
            header {
                background-color: #333;
                color: #fff;
                text-align: center;
                padding: 1rem;
                margin: 0;
            }

        </style>
        <link rel="stylesheet" href="ownstyle/loginandcreate.css">
        </style>
    </head>
    <body>
    <header>
        <h1>PegazUp</h1>
    </header>
    <div class="mbody">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Create account</h3>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="fname" class="form-control" placeholder="Fisrt Name*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" class="form-control" placeholder="Last Name*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email*" value="" />
                        </div>
                        <!--
                        <div class="form-group">
                            <input type="number" name="phone" class="form-control" placeholder="Phone*" value="" />
                        </div>
                        -->
                        <div class="form-group">
                            <input type="number" name="age" class="form-control" placeholder="Age*" value="" />
                        </div>

                        <div class="form-group">
                        <select name="city" class="form-control" name="city" aria-label="Default select example">
                        <option selected>City*</option>
                            <?php
                            $control = new Controller();
                            $cities = $control->getCities();
                            foreach ($cities as $city){
                            echo '<option value="'.$city.'">'.$city.'</option>';
                            }
                            ?>
                        </select>
                        </div>


                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="cpassword" class="form-control" placeholder="Comfirm Password*" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btnSubmit"
                                   style="background-color: #008fcc" value="Create" />
                        </div>
                        <div class="form-group">
                            <p>Have an account already?</p>
                            <a href="login.php"  style="color: #008fcc" class="ForgetPwd">log in now</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>

    
    </body>
    </html>
<?php
if (isset($_POST["submit"])){
    //include("Controller.php");

    $fname = (string)$_POST["fname"];
    $lname = (string)$_POST["lname"];
    $email = (string)$_POST["email"];
    //$phone = (int)$_POST["phone"];
    $age = (int)$_POST["age"];
    $password = (string)$_POST["password"];
    $cpassword = (string)$_POST["cpassword"];

    require_once 'Person.php';
    require_once 'Controller.php';
    $person = new Person(
        (string)$_POST["fname"],
        (string)$_POST["lname"],
        (string)$_POST["email"],
        (int)$_POST["age"],
        (int)$_POST["password"]
    );
    $person->setCity((string)$_POST["city"]);
    $controls = new Controller();
    $controls->createperson($person);


}

?>