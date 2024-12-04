<?php

class Coach {
    private $id;
    private $firstName;
    private $lastName;
    private $gender;
    private $removed;

    public function __construct($id, $firstName, $lastName, $gender, $removed) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->removed = $removed;
    }

    public function getId() {
        return $this->id;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getGender() {
        return $this->gender;
    }

    public function isRemoved() {
        return $this->removed;
    }
}

class CoachManager {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addCoach($firstName, $lastName, $gender) {
        $sql = "INSERT INTO coachs (firstname, lastname, sex) VALUES ('$firstName', '$lastName', '$gender')";
        $result = $this->conn->query($sql);

        if ($result) {
            echo "Coach ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du coach : " . $this->conn->error;
        }
    }

    public function removeCoach($id) {
        $sql = "UPDATE coachs SET retire = 1 WHERE id = '$id'";
        $result = $this->conn->query($sql);

        if ($result) {
            echo "Coach retiré avec succès.";
        } else {
            echo "Erreur lors du retrait du coach : " . $this->conn->error;
        }
    }

    public function getAvailableCoaches() {
        $coaches = [];

        $sql = "SELECT * FROM coachs WHERE retire = 0";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $coach = new Coach($row['id'], $row['firstname'], $row['lastname'], $row['sex'], $row['retire']);
                $coaches[] = $coach;
            }
        }

        return $coaches;
    }

    public function getCoachById($id){
        $sql = "SELECT * FROM coachs WHERE id = '$id'";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
}