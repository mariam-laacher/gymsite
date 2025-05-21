<?php
session_start();
include("Controller.php");
function isUserConnected() {
    //true or false
    return isset($_SESSION['id']);
}
function connectUser($email, $password){
    require_once "Person.php";
    $controler = new Controller();
    //$person = new Person();
    $person = $controler->getPersonByEmail($email);
    //var_dump($person);

    if ($person !== null) {
        $hash = $person->getPassword();
        if ($hash == $password){
            //session -> Person
            $_SESSION['id'] = $person->getId();
            $_SESSION['fname'] = $person->getFname();
            $_SESSION['lname'] = $person->getLname();
            $_SESSION['age'] = $person->getAge();
            $_SESSION['email'] = $person->getEmail();
            $_SESSION['city'] = $person->getCity();
            if ($person->getCoachId() != null){
                $_SESSION['coach_id'] = $person->getCoachId();
            }
            if ($person->getPaidDate() != null){
                $_SESSION['expire_date'] = $person->getExpireDate();
                $_SESSION['paid_date'] = $person->getPaidDate();
            }
            header('Location: index.php');
        } else {
            echo "<script>alert('Invalid information')</script>";
        }
    } else {
        echo "<script>alert('Email not found')</script>";
    }

}