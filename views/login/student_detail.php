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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <!-- Container voor de inhoud -->
    <div class="w-full max-w-lg p-6 space-y-8 bg-white shadow-md rounded-lg text-center">
        
     

        <h2 class="text-2xl font-bold text-gray-800">Details van <?php echo htmlspecialchars($row["firstName"]) . " " . htmlspecialchars($row["lastName"]); ?></h2>

        <!-- Profielfoto -->
        <img src='/views/images/<?php echo !empty($row["profielFoto"]) ? htmlspecialchars($row["profielFoto"]) : 'default.jpg'; ?>' alt='Profielfoto' class='w-40 h-40 rounded-full object-cover mx-auto'>

        <!-- Studentgegevens -->
        <div class="mt-6 space-y-4 text-gray-700">
            <p><strong>Studentnummer:</strong> <?php echo htmlspecialchars($row["studentnummer"]); ?></p>
            <p><strong>DUO Nummer:</strong> <?php echo htmlspecialchars($row["duoNumber"]); ?></p>
            <p><strong>Klas:</strong> <?php echo htmlspecialchars($row["klas"]); ?></p>
            <p><strong>Jaar:</strong> <?php echo htmlspecialchars($row["jaar"]); ?></p>
            <p><strong>Opleiding:</strong> <?php echo htmlspecialchars($row["opleiding"]); ?></p>
            <p><strong>Keuzedeel:</strong> <?php echo htmlspecialchars($row["keuzedeel"]); ?></p>
        </div>

        <!-- Terug Knop -->
        <a href="docent.php" class="mt-8 block w-full bg-blue-500 text-white text-center font-bold py-2 px-4 rounded hover:bg-blue-600">Terug naar overzicht</a>
    </div>

</body>

</html>

<?php
// Sluit de databaseverbinding
$conn->close();
?>
