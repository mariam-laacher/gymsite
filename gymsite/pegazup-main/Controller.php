<?php
class Controller
{
    private $db_server = "localhost:3306";
    private $db_user = "root";
    private $db_pass = "12345";
    private $db_name = "pegazup";
    private $conn;


    public function getConn()
    {
        return $this->conn;
    }


    public function __construct() {
        // Create a connection
        $this->conn = new mysqli($this->db_server, $this->db_user, $this->db_pass, $this->db_name);

        // Check the connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    //CREATE
    public function createperson($person) {
        //$person = new Person();
        $fname = $person->getFname();
        $lname = $person->getLname();
        $email = $person->getEmail();
        $age = $person->getAge();
        $password = $person->getPassword();
        $city = $person->getCity();

        $sql = "INSERT INTO people(fname, lname, email, age, city, password)
        VALUES ('$fname', '$lname', '$email', '$age', '$city', '$password')";

        mysqli_query($this->conn, $sql);
    }

    public function getPersonByEmail($email) {
        require_once "Person.php";
        $sql = "SELECT * FROM people WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);//exe
        if (mysqli_num_rows($result)){//ligne
            $row = mysqli_fetch_assoc($result);//data
            $person = new Person(
                $row['fname'],
                $row['lname'],
                $row['email'],
                $row['age'],
                $row['password']
            );
            $person->setId($row['id']);
            if ($row['coach_id'] != null){
                $person->setCoachId($row['coach_id']);
            }
            if ($row['paid_date'] != null){
                $person->setExpireDate($row['expire_date']);
                $person->setPaidDate($row['paid_date']);
            }
            $person->setCity($row['city']);
            return $person;
        }
        return null;
    }

    public function updatePersonByEmail($email, $person) {
        $sql = "UPDATE people SET name = ?, age = ?, gender = ? WHERE email = ?";
    }
    public function updatePersonInscriptionByEmail($email, $inscription, $month) {
        $sql = "UPDATE people SET inscription = '$inscription',
                  paid_date = CURRENT_DATE,
                  expire_date = DATE_ADD(CURRENT_DATE, INTERVAL $month MONTH)
                  WHERE email = '$email'";
        mysqli_query($this->conn, $sql);
    }

    public function updatePersonCoachingByEmail($email, $coachID) {
        $sql = "UPDATE people SET coach_id = '$coachID'
                  WHERE email = '$email'";
        mysqli_query($this->conn, $sql);
    }

    public function deletePerson($id) {
        $sql = "DELETE FROM persons WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("i", $id);

        // Execute the statement
        $result = $stmt->execute();

        // Check for success
        if ($result) {
            echo "Person deleted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    public function __destruct() {
        // Close the database connection when the object is destroyed
        if ($this->conn) {
            $this->conn->close();
        }
    }

    function getCities(){
        $sql = "SELECT * FROM CITIES;";
        $result = mysqli_query($this->conn, $sql);
        $list = [];
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $list[] = $row["city"];
            }
        }
        return $list;
    }
/*
    // Example usage
    $controller = new PersonController("your_host", "your_username", "your_password", "your_database");

    // Create a new person
    $controller->createPerson("John Doe", 25, "Male");

    // Get a person by ID
    $controller->getPersonById(1);

    // Update a person
    $controller->updatePerson(1, "Jane Doe", 28, "Female");

    // Delete a person
    $controller->deletePerson(1);
*/
}