<?php
// Databaseconfiguratie
$servername = "mysql"; // Of "mysql" als het binnen een Docker-container draait
$username = "mbogodigitalUser";
$password = "Vrieskist@247";
$dbname = "mbogodigital";


// Maak verbinding met MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Query om de gegevens van studenten op te halen
$sql = "SELECT profielFoto, firstName, lastName, studentnummer, klas, jaar, opleiding, keuzedeel FROM studenten";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Docent Overzicht</title>
    <style>
        .student {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }
        img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Docent Overzicht</h1>

    <!-- Formulier voor cohort en keuzedeel -->
    <form method="GET" action="docent.php">
        <label for="cohort">Welk cohort wilt u:</label>
        <input type="text" id="cohort" name="cohort"><br><br>

        <label for="keuzedeel">Keuzedeel gekozen:</label>
        <select id="keuzedeel" name="keuzedeel">
            <option value="ja">Ja</option>
            <option value="nee">Nee</option>
        </select><br><br>

        <input type="submit" value="Toon Studenten">
    </form>

    <div>
        <?php
        // Check of er resultaten zijn
        if ($result->num_rows > 0) {
            // Resultaten in een loop tonen
            while($row = $result->fetch_assoc()) {
                echo "<div class='student'>";
                echo "<img src='uploads/" . $row["profielFoto"] . "' alt='Student Foto'>";
                echo "<p>" . $row["firstName"] . " " . $row["lastName"] . "</p>";
                echo "<p>Keuzedeel: " . $row["keuzedeel"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "Geen studenten gevonden";
        }
        // Sluit de databaseverbinding
        $conn->close();
        ?>
    </div>
</body>
</html>