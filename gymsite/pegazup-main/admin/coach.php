<?php

// Connexion à la base de données
$servername = "localhost:3306";
$username = "root";
$password = "12345";
$dbname = "pegazup";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
require_once 'Coacher.php';
$coachManager = new CoachManager($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addCoach'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['gender'];
        $coachManager->addCoach($firstName, $lastName, $gender);
    }

    if (isset($_POST['removeCoach'])) {
        $coachIdToRemove = $_POST['coachId'];
        $coachManager->removeCoach($coachIdToRemove);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">PEGAZUP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home</a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link disabled" href="#">ADMIN</a>
        </div>
    </div>
</nav>
        <h2>Coach Manager</h2>
        <div style="background-color:#fff;padding: 5%;width:50%;">
        <form method="post">
            <div class="form-group">
            <label for="firstName">Prénom:</label>
            <input type="text" name="firstName" id="firstNamet" class="form-control" required>
            </div>

            <div class="form-group">
            <label for="lastName">Nom:</label>
            <input type="text" name="lastName"  id="lastName" class="form-control" required>
            </div>

            <div class="form-group">
            <label for="gender">Sexe:</label>
            <select name="gender" id="gender" class="form-control" required><br> <br>
                <option value="Male">Homme</option>
                <option value="Female">Femme</option>
            </select>
            </div>

            <div class="form-group">
            <input type="submit" name="addCoach" class="btn btn-primary" value="Ajouter">
            </div>
        </form>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Prénom Nom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($coachManager->getAvailableCoaches() as $coach) {
                    $rowClass = $coach->isRemoved() ? 'removed' : '';
                    echo "<tr class='{$rowClass}' disabled>
                            <td>{$coach->getId()}</td>
                            <td>{$coach->getFullName()}</td>
                            <td>{$coach->getGender()}</td>
                            <td>
                                <form method='post'>
                                    <input type='hidden' name='coachId' value='{$coach->getId()}'>
                                    <input type='submit' name='removeCoach' value='Retirer'>
                                </form>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>


</body>

</html>