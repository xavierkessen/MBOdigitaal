<?php
// Databaseconfiguratie
$servername = "mysql";
$username = "mbogodigitalUser";
$password = "Vrieskist@247";
$dbname = "mbogodigital";

// Maak verbinding met MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Haal de student-ID op
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $studentId = $_GET['id'];

    // Query om de informatie van de student op te halen
    $sql = "SELECT * FROM studenten WHERE id = $studentId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Studentgegevens ophalen
        $row = $result->fetch_assoc();
    } else {
        echo "Student niet gevonden.";
        exit;
    }
} else {
    echo "Ongeldige student-ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail</title>
    <style>
        .student-detail {
            width: 50%;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            text-align: left;
        }
        img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="student-detail">
        <h2>Details van <?php echo htmlspecialchars($row["firstName"]) . " " . htmlspecialchars($row["lastName"]); ?></h2>
        
        <!-- Profielfoto -->
        <img src='/views/images/<?php echo !empty($row["profielFoto"]) ? htmlspecialchars($row["profielFoto"]) : 'default.jpg'; ?>' alt='Profielfoto'>

        <!-- Studentgegevens -->
        <p><strong>Studentnummer:</strong> <?php echo htmlspecialchars($row["studentnummer"]); ?></p>
        <p><strong>DUO Nummer:</strong> <?php echo htmlspecialchars($row["duoNumber"]); ?></p>
        <p><strong>Klas:</strong> <?php echo htmlspecialchars($row["klas"]); ?></p>
        <p><strong>Jaar:</strong> <?php echo htmlspecialchars($row["jaar"]); ?></p>
        <p><strong>Opleiding:</strong> <?php echo htmlspecialchars($row["opleiding"]); ?></p>
        <p><strong>Keuzedeel:</strong> <?php echo htmlspecialchars($row["keuzedeel"]); ?></p>

        <!-- Terug Knop -->
        <a href="docent.php" class="back-button">Terug naar overzicht</a>
    </div>
</body>
</html>

<?php
// Sluit de databaseverbinding
$conn->close();
?>
