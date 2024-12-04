<?php
function cardpage($price)
{
    echo '
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .padding{
            padding:5rem !important;
            margin-left:300px;
        }
        .card {
            margin-bottom: 1.5rem;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #c8ced3;
            border-radius: .25rem;
        }

        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: #f0f3f5;
            border-bottom: 1px solid #c8ced3;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .form-control:focus {
            color: #5c6873;
            background-color: #fff;
            border-color: #c8ced3 !important;
            outline: 0;
            box-shadow: 0 0 0 #F44336;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
include "../navbar.php";
nav();
?>

<div class="padding">
    <div class="row">
        <div class="col-sm-6">
        <form method="post">
            <div class="card">
                <div class="card-header">
                    <strong>Credit Card</strong>
                    <small>enter your card details</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">



                                <label for="name">Name</label>
                                <input class="form-control" id = "name"  name="name" type = "text" placeholder = "Enter your name"
                                disabled value = "' .$_SESSION['fname'].'">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="ccnumber">Credit Card Number</label>


                                <div class="input-group">
                                    <input class="form-control" type="text" name="number" placeholder="0000 0000 0000 0000" autocomplete="email">
                                    <div class="input-group-append">
<span class="input-group-text">
<i class="mdi mdi-credit-card"></i>
</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <script>
function updateValue() {
  var selectedValue = document.getElementById("month").value;
  var ps = parseInt('.$price.');
  var po = parseInt(selectedValue)*'.$price.';
  document.getElementById("price").innerText = po
}
updateValue();

</script>
                        <div class="form-group col-sm-4">
                            <label for="ccmonth">Month</label>
                            <select id="month" name="months" class="form-control" onchange="updateValue()">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ccyear">Year</label>
                            <select name="year" class="form-control" id="ccyear">
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cvv">CVV/CVC</label>
                                <input class="form-control" id="cvv" name="cvv" type="text" placeholder="123">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <input class="btn btn-sm btn-success float-right" type="submit" name="submit" value="Continue">
                    <input class="btn btn-sm btn-danger" type="reset" value="Reset">
                    <h3 id="price">'.$price.'</h3>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

</body>
</html>

';

}
?>
