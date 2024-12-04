<?php
if (isset($_SESSION['city'])){
    echo "Welcome to pegazup of ".$_SESSION['city']."<br>";
}

if (isset($_SESSION['coach_id'])) {
    if ($_SESSION['coach_id'] != null) {
        include "admin/Coacher.php";
        include "Controller.php";
        $control = new Controller();
        $row = (new CoachManager($control->getConn()))->getCoachById($_SESSION['coach_id']);
        echo "YOU ARE COACHED BY " . $row['firstname'] . " " . $row['lastname'];
    }
}



