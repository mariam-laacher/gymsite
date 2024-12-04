<?php

class CardController{
    private $controler;


    public function __construct()
    {
        $this->controler = new Controller();
    }
    public function createCard($card) {

        $name = $card->getName();
        $number = $card->getNumber();
        $exp_date = $card->getExpDate();
        $cvv = $card->getCvv();
        $personid = $_SESSION['id'];
        $sql = "INSERT INTO cards(name, number, exp_date, cvv, personid)
        VALUES ('$name', '$number', '$exp_date', '$cvv', '$personid')";
        mysqli_query($this->controler->getConn(), $sql);

    }


}
?>