<?php

class Person{
    private int $id;
    private string $fname;
    private string $lname;
    private string $email;

    private int $age;
    private string $password;
    private string $inscription;
    private string $paid_date;
    private string $expire_date;
    private int $coach_id;
    private string $city;



    public function __construct($fname=null, $lname=null, $email=null, $age=null, $password=null)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->age = $age;
        //$this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFname(): string
    {
        return $this->fname;
    }

    public function setFname(string $fname): void
    {
        $this->fname = $fname;
    }

    public function getLname(): string
    {
        return $this->lname;
    }

    public function setLname(string $lname): void
    {
        $this->lname = $lname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getInscription(): string
    {
        return $this->inscription;
    }

    public function setInscription(string $inscription): void
    {
        $this->inscription = $inscription;
    }

    public function getPaidDate(): string
    {
        return $this->paid_date;
    }

    public function setPaidDate(string $paid_date): void
    {
        $this->paid_date = $paid_date;
    }

    public function getExpireDate(): string
    {
        return $this->expire_date;
    }

    public function setExpireDate(string $expire_date): void
    {
        $this->expire_date = $expire_date;
    }

    public function getCoachId(): ?int
    {
        if ($this->coach_id != null){
            return $this->coach_id;
        }
        return null;

    }

    public function setCoachId(int $coach_id): void
    {
        $this->coach_id = $coach_id;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }



}
?>