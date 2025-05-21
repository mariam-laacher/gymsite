<?php
include 'creditcard.php';
include("../config.php");
if (!isUserConnected()) {
    header('Location: ../login.php');
}
if (!isset($_SESSION['price'])) {
    header('Location: pricing.php');
}
$inscriptionType = 0;
if ($_SESSION['price'] == 20){
    $inscriptionType = 1;
}else if ($_SESSION['price'] == 40){
    $inscriptionType = 2;
}else if ($_SESSION['price'] == 70){
    $inscriptionType = 3;
}

if (isset($_POST['submit'])){
        if (!(empty($_POST['name']) || empty($_POST['number']) || empty($_POST['year']) || empty($_POST['cvv']))){
            echo "empty";
        }else{
            $control = new Controller();
            require_once "CardController.php";
            require_once "Card.php";
            $cardControl = new CardController();
            $card = new Card(
                (string)$_SESSION['fname'],
                (string)$_POST['number'],
                (string)$_POST['year'],
                (int)$_POST['cvv'],
                (int)$_SESSION['id']
            );
            $cardControl->createCard($card);
            $control->updatePersonInscriptionByEmail($_SESSION['email'], $inscriptionType, $_POST['months']);
        }
    }

cardpage($_SESSION['price']);
