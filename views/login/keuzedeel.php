<?php
// Databaseconfiguratie
$servername = "mysql";
$username = "mbogodigitalUser";
$password = "Vrieskist@247";
$dbname = "mbogodigital";

// Maak verbinding met de MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Controleer of een keuzedeel-id is meegegeven in de URL
if (isset($_GET['id'])) {
    $keuzedeel_id = $_GET['id'];

    // Haal de details van het keuzedeel op
    $sql = "SELECT * FROM keuzedelen WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Error preparing the statement: ' . $conn->error);
    }

    $stmt->bind_param("i", $keuzedeel_id);  // Gebruik 'i' voor integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Controleer of er resultaten zijn
    if ($result->num_rows > 0) {
        // Toon de details van het keuzedeel
        $keuzedeel = $result->fetch_assoc();
        $keuzedeel_naam = !empty($keuzedeel['naam']) ? $keuzedeel['naam'] : 'Naam onbekend';
        $keuzedeel_code = !empty($keuzedeel['code']) ? $keuzedeel['code'] : 'Code onbekend';
        $keuzedeel_beschrijving = !empty($keuzedeel['beschrijving']) ? $keuzedeel['beschrijving'] : 'Beschrijving onbekend';
        $keuzedeel_wat_ga_je_doen = !empty($keuzedeel['wat_ga_je_doen']) ? $keuzedeel['wat_ga_je_doen'] : 'Wat ga je doen onbekend';
        $keuzedeel_wat_wordt_er_verwacht = !empty($keuzedeel['wat_wordt_er_verwacht']) ? $keuzedeel['wat_wordt_er_verwacht'] : 'Wat wordt er verwacht onbekend';
        $keuzedeel_wat_levert_het_op = !empty($keuzedeel['wat_levert_het_op']) ? $keuzedeel['wat_levert_het_op'] : 'Wat levert het op onbekend';
    } else {
        // Geen resultaten gevonden voor dit ID
        $keuzedeel_naam = "Keuzedeel niet gevonden";
        $keuzedeel_code = $keuzedeel_beschrijving = $keuzedeel_wat_ga_je_doen = $keuzedeel_wat_wordt_er_verwacht = $keuzedeel_wat_levert_het_op = "Er zijn geen details beschikbaar voor dit keuzedeel.";
    }
} else {
    // Geen ID in de URL
    $keuzedeel_naam = "Geen keuzedeel geselecteerd";
    $keuzedeel_code = $keuzedeel_beschrijving = $keuzedeel_wat_ga_je_doen = $keuzedeel_wat_wordt_er_verwacht = $keuzedeel_wat_levert_het_op = "Er is geen keuzedeel geselecteerd. Keer terug naar de vorige pagina en kies een keuzedeel.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $keuzedeel_naam; ?> - Keuzedeel Details</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Voeg Tailwind CSS toe via CDN -->
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl w-full bg-white p-10 rounded-lg shadow-lg transform transition duration-500 hover:scale-105">
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-6 tracking-wide uppercase">
            <?php echo $keuzedeel_naam; ?>
        </h1>

        <ul class="list-disc pl-6 text-lg text-gray-700 mb-2">
            <li><strong>Code:</strong> <?php echo $keuzedeel_code; ?></li>
        </ul>

        <h2 class="text-2xl font-semibold text-blue-600 mb-2">Beschrijving</h2>
        <p class="text-lg text-gray-700 mb-4 leading-relaxed whitespace-pre-line">
            <?php echo $keuzedeel_beschrijving; ?>
        </p>

        <h2 class="text-2xl font-semibold text-blue-600 mb-2">Wat ga je doen?</h2>
        <p class="text-lg text-gray-700 mb-4 leading-relaxed whitespace-pre-line">
            <?php echo $keuzedeel_wat_ga_je_doen; ?>
        </p>

        <h2 class="text-2xl font-semibold text-blue-600 mb-2">Wat wordt er verwacht?</h2>
        <p class="text-lg text-gray-700 mb-4 leading-relaxed whitespace-pre-line">
            <?php echo $keuzedeel_wat_wordt_er_verwacht; ?>
        </p>

        <h2 class="text-2xl font-semibold text-blue-600 mb-2">Wat levert het op?</h2>
        <p class="text-lg text-gray-700 mb-4 leading-relaxed whitespace-pre-line">
            <?php echo $keuzedeel_wat_levert_het_op; ?>
        </p>

        <!-- Toevoegen van een terug-knop -->
        <div class="mt-6">
            <a href="docent.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Terug naar het overzicht
            </a>
        </div>
    </div>
</body>
</html>
