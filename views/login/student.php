<?php
// Verbinding maken met de database
$host = "mysql"; 
$db = "mbogodigital"; 
$user = "mbogodigitalUser"; 
$pass = "Vrieskist@247";

try {
    // PDO verbinding maken
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kan geen verbinding maken met de database: " . $e->getMessage());
}

// Verwerken van het formulier voor het toewijzen van keuzedeel
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['assign_keuzedeel'])) {
    // Haal de velden op uit het formulier
    $taak_naam = $_POST['taak_naam'] ?? '';
    $toegewezen_aan = $_POST['toegewezen_aan'] ?? '';

    // Basisvalidatie: check of beide velden niet leeg zijn
    if (!empty($taak_naam) && !empty($toegewezen_aan)) {
        // Controleer of het e-mailadres geldig is
        if (filter_var($toegewezen_aan, FILTER_VALIDATE_EMAIL)) {
            try {
                // SQL query om de kolom 'keuzedeel' bij te werken in de 'studenten' tabel
                $sql = "UPDATE studenten SET keuzedeel = :taak_naam WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':taak_naam' => $taak_naam,
                    ':email' => $toegewezen_aan,
                ]);
                // Controleer of er een rij is bijgewerkt
                if ($stmt->rowCount() > 0) {
                    $success_message = "Keuzedeel succesvol toegewezen!";
                } else {
                    $error_message = "Geen student gevonden met dit e-mailadres.";
                }
            } catch (PDOException $e) {
                // Foutafhandeling wanneer er een probleem is met de query
                $error_message = "Fout bij het opslaan van het keuzedeel: " . $e->getMessage();
            }
        } else {
            // Als het e-mailadres niet geldig is
            $error_message = "Vul een geldig e-mailadres in.";
        }
    } else {
        // Als de velden niet zijn ingevuld
        $error_message = "Vul alstublieft alle velden in.";
    }
}

// Verwerken van het formulier voor het verwijderen van keuzedeel
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_keuzedeel'])) {
    $toegewezen_aan = $_POST['toegewezen_aan'] ?? '';

    if (!empty($toegewezen_aan)) {
        // Controleer of het e-mailadres geldig is
        if (filter_var($toegewezen_aan, FILTER_VALIDATE_EMAIL)) {
            try {
                // SQL query om de kolom 'keuzedeel' te verwijderen (leegmaken) in de 'studenten' tabel
                $sql = "UPDATE studenten SET keuzedeel = NULL WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':email' => $toegewezen_aan,
                ]);
                // Controleer of er een rij is bijgewerkt
                if ($stmt->rowCount() > 0) {
                    $success_message = "Keuzedeel succesvol verwijderd!";
                } else {
                    $error_message = "Geen student gevonden met dit e-mailadres.";
                }
            } catch (PDOException $e) {
                // Foutafhandeling wanneer er een probleem is met de query
                $error_message = "Fout bij het verwijderen van het keuzedeel: " . $e->getMessage();
            }
        } else {
            // Als het e-mailadres niet geldig is
            $error_message = "Vul een geldig e-mailadres in.";
        }
    } else {
        // Als het e-mailadres niet is ingevuld
        $error_message = "Vul alstublieft het e-mailadres in.";
    }
}

// Inzien van het geselecteerde keuzedeel door de student
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['view_keuzedeel'])) {
    $toegewezen_aan = $_POST['toegewezen_aan'] ?? '';

    if (!empty($toegewezen_aan)) {
        // Controleer of het e-mailadres geldig is
        if (filter_var($toegewezen_aan, FILTER_VALIDATE_EMAIL)) {
            try {
                // SQL query om het keuzedeel op te halen uit de 'studenten' tabel
                $sql = "SELECT keuzedeel FROM studenten WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':email' => $toegewezen_aan,
                ]);
                $keuzedeel = $stmt->fetchColumn();

                if ($keuzedeel) {
                    $success_message = "Je hebt het keuzedeel '$keuzedeel' gekozen.";
                } else {
                    $error_message = "Geen keuzedeel gevonden voor dit e-mailadres.";
                }
            } catch (PDOException $e) {
                // Foutafhandeling wanneer er een probleem is met de query
                $error_message = "Fout bij het ophalen van het keuzedeel: " . $e->getMessage();
            }
        } else {
            // Als het e-mailadres niet geldig is
            $error_message = "Vul een geldig e-mailadres in.";
        }
    } else {
        // Als het e-mailadres niet is ingevuld
        $error_message = "Vul alstublieft het e-mailadres in.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .logout-button {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Hier komt de rest van je pagina content -->

    <form action="index.php" method="post">
        <button type="submit" class="logout-button">Uitloggen</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuzedeel Beheer</title>
    <!-- Voeg Tailwind CSS toe via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Navigatie Tabjes -->
<div class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-around">
        <a href="/views/keuzedelenstudent/basisprogrameren.php" class="text-white hover:bg-gray-700 py-2 px-4 rounded">Basisprogrammeren</a>
        <a href="/views/keuzedelenstudent/digitalevaardigheden.php" class="text-white hover:bg-gray-700 py-2 px-4 rounded">Digitale Vaardigheden</a>
        <a href="/views/keuzedelenstudent/fotografiebasis.php" class="text-white hover:bg-gray-700 py-2 px-4 rounded">Fotografie Basis</a>
        <a href="/views/keuzedelenstudent/inspelenopinnovaties.php" class="text-white hover:bg-gray-700 py-2 px-4 rounded">Inspelen op Innovaties</a>
        <a href="/views/keuzedelenstudent/ondernemendgedrag.php" class="text-white hover:bg-gray-700 py-2 px-4 rounded">Ondernemend Gedrag</a>
        <a href="/views/keuzedelenstudent/orientatieopondernemendschap.php" class="text-white hover:bg-gray-700 py-2 px-4 rounded">Oriëntatie op Ondernemerschap</a>
        <a href="/views/keuzedelenstudent/verdiepingsoftware.php" class="text-white hover:bg-gray-700 py-2 px-4 rounded">Verdieping Software</a>
    </div>
</div>

<div class="container mx-auto my-8 p-6 bg-white rounded shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Keuzedeel selecteren</h2>

    <!-- Keuzedeel Toewijzen Formulier -->
    <form action="student.php" method="POST" class="mb-6">
        <label for="taak_naam" class="block text-lg font-semibold text-gray-600 mb-2">Keuzendelen:</label>
        <select id="taak_naam" name="taak_naam" required class="block w-full p-2 mb-4 border border-gray-300 rounded">
            <option value="">--Selecteer een keuzedeel--</option>
            <option value="basisprogrameren">basisprogrameren</option>
            <option value="digitalevaardigheden">digitalevaardigheden</option>
            <option value="fotografiebasis">fotografiebasis</option>
            <option value="inspelenopinnovaties">inspelenopinnovaties</option>
            <option value="ondernemendgedrag">ondernemendgedrag</option>
            <option value="orientatieopondernemendschap">orientatieopondernemendschap</option>
            <option value="verdiepingsoftware">verdiepingsoftware</option>
        </select>

        <label for="toegewezen_aan" class="block text-lg font-semibold text-gray-600 mb-2">Toewijzen aan (e-mailadres):</label>
        <input type="text" id="toegewezen_aan" name="toegewezen_aan" required class="block w-full p-2 mb-4 border border-gray-300 rounded">

        <input type="submit" name="assign_keuzedeel" value="Toewijzen" class="bg-blue-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-blue-600">
    </form>

    <!-- Keuzedeel Verwijderen Formulier -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Keuzedeel verwijderen</h2>
    <form action="student.php" method="POST" class="mb-6">
        <label for="toegewezen_aan" class="block text-lg font-semibold text-gray-600 mb-2">E-mailadres van student:</label>
        <input type="text" id="toegewezen_aan" name="toegewezen_aan" required class="block w-full p-2 mb-4 border border-gray-300 rounded">

        <input type="submit" name="remove_keuzedeel" value="Verwijderen" class="bg-red-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-red-600">
    </form>

    <!-- Keuzedeel Inzien Formulier -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Keuzedeel inzien</h2>
    <form action="student.php" method="POST">
        <label for="toegewezen_aan" class="block text-lg font-semibold text-gray-600 mb-2">E-mailadres van student:</label>
        <input type="text" id="toegewezen_aan" name="toegewezen_aan" required class="block w-full p-2 mb-4 border border-gray-300 rounded">

        <input type="submit" name="view_keuzedeel" value="Inzien" class="bg-green-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-green-600">
    </form>

    <!-- Succes- of Foutmelding -->
    <?php
    if (isset($success_message)) {
        echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6'>$success_message</div>";
    } elseif (isset($error_message)) {
        echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6'>$error_message</div>";
    }
    ?>
</div>

</body>
</html>
