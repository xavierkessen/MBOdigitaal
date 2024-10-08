<?php
session_start();

// Databaseconfiguratie
$servername = "mysql"; // Aanpassen naar jouw serverconfiguratie
$username = "mbogodigitalUser";
$password = "Vrieskist@247"; 
$dbname = "mbogodigital"; 

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer of de verbinding werkt
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Zoekfunctionaliteit
$search = isset($_GET['search']) ? $_GET['search'] : '';

// SQL-query om studenten op te halen
$sql = "SELECT * FROM studenten WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR studentnummer LIKE '%$search%' ORDER BY lastName";
$result = $conn->query($sql);

// Inloglogica
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    // Zoek de gebruiker op in de database
    $sql = "SELECT * FROM docenten WHERE gebruikersnaam = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gebruikersnaam);
    $stmt->execute();
    $result_login = $stmt->get_result();

    if ($result_login->num_rows > 0) {
        // Gebruiker gevonden
        $row = $result_login->fetch_assoc();

        // Controleer het wachtwoord
        if (password_verify($wachtwoord, $row['wachtwoord'])) {
            // Wachtwoord is correct, sla de gebruikersnaam op in de sessie
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            header("Location: beveiligde_pagina.php");
            exit;
        } else {
            $fout = "Onjuist wachtwoord!";
        }
    } else {
        $fout = "Gebruikersnaam bestaat niet!";
    }
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studenten Overzicht & Inloggen</title>
    <!-- Voeg Tailwind CSS toe via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">

    <div class="w-full max-w-3xl bg-white p-10 rounded-lg shadow-lg">
        <!-- Inlogformulier -->
        <div class="w-full max-w-md mb-8">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">Inloggen</h2>
            <?php if (isset($fout)) : ?>
            <p class="text-red-600 text-center mb-4"><?php echo $fout; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-4">
                    <label for="gebruikersnaam" class="block text-gray-700 font-bold mb-2">Gebruikersnaam:</label>
                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <div class="mb-6">
                    <label for="wachtwoord" class="block text-gray-700 font-bold mb-2">Wachtwoord:</label>
                    <input type="password" name="wachtwoord" id="wachtwoord" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <div class="flex items-center justify-between">
                    <input type="submit" value="Inloggen"
                        class="bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 ease-in-out">
                </div>
            </form>
        </div>

        

<?php
$conn->close();
?>
