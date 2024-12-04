<?php

class Card
{
    private $id;
    private $name;
    private $number;
    private $exp_date;
    private $cvv;
    private $personId;

    public function __construct($name, $number, $exp_date, $cvv, $personId)
    {
        $this->name = $name;
        $this->number = $number;
        $this->exp_date = $exp_date;
        $this->cvv = $cvv;
        $this->personId = $personId;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getExpDate()
    {
        return $this->exp_date;
    }

    /**
     * @param mixed $exp_date
     */
    public function setExpDate($exp_date)
    {
        $this->exp_date = $exp_date;
    }

    /**
     * @return mixed
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @param mixed $cvv
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
    }

    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param mixed $personId
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
    }


}