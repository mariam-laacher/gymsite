<?php
include "../admin/Coacher.php";

include "../config.php";
$control = new Controller();
$coachM = new CoachManager($control->getConn());
$coaches = $coachM->getAvailableCoaches();
if (!isUserConnected()) {
    header('Location: ../login.php');
}
if (isset($_POST['submit'])){
    $control->updatePersonCoachingByEmail($_SESSION['email'], $_POST['coachId']);
    $_SESSION['coach_id'] = $_POST['coachId'];
    header('Location: ../index.php');
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

</head>
<body>
<?php
include "../navbar.php";
nav();
?>


<div class="container mt-5">
    <h2>Coach Details</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Sex</th>
            <th>Choice</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($coaches as $coach){
            echo "
                <tr>
                    <td>".$coach->getFullName()."</td>
                    <td>".$coach->getGender()."</td>
                    <td>
                        <form method='post'>
                        <input type='hidden' name='coachId' value='{$coach->getId()}'>
                        <input type='submit' name='submit' value='CHOOSE'>
                        </form>
                    </td>
                </tr>
            ";
        }
        ?>

        </tbody>
    </table>
</div>

</body>
</html>