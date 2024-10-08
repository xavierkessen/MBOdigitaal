<?php
// Verbinding maken met de database
$host = "mysql"; // Dit is normaal de hostnaam, in Docker zou het "mysql" kunnen zijn
$db = "mbogodigital"; // De naam van je database
$user = "mbogodigitalUser"; // Je databasegebruikersnaam
$pass = "Vrieskist@247"; // Je wachtwoord

try {
    // PDO verbinding maken met de juiste variabelen
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kan geen verbinding maken met de database: " . $e->getMessage());
}

// Verwerken van het formulier wanneer het wordt ingediend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Haal de velden op uit het formulier
    $taak_naam = $_POST['taak_naam'] ?? '';
    $toegewezen_aan = $_POST['toegewezen_aan'] ?? '';

    // Basisvalidatie: check of beide velden niet leeg zijn
    if (!empty($taak_naam) && !empty($toegewezen_aan)) {
        try {
            // SQL query om de gegevens in de database op te slaan
            $sql = "INSERT INTO taken (taak_naam, toegewezen_aan) VALUES (:taak_naam, :toegewezen_aan)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':taak_naam' => $taak_naam,
                ':toegewezen_aan' => $toegewezen_aan,
            ]);
            $success_message = "Taak succesvol toegewezen!";
        } catch (PDOException $e) {
            // Foutafhandeling wanneer er een probleem is met de query
            $error_message = "Fout bij het opslaan van de taak: " . $e->getMessage();
        }
    } else {
        // Als de velden niet zijn ingevuld
        $error_message = "Vul alstublieft alle velden in.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taak Toewijzen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 20px 0;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            color: #fff;
            background-color: #28a745;
        }
        .error {
            margin-top: 20px;
            padding: 10px;
            color: #fff;
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<h2>Taak Toewijzen</h2>

<!-- Taak Toewijzen Formulier -->
<form action="toewijzen.php" method="POST">
    <label for="taak_naam">Taak Naam:</label><br>
    <input type="text" id="taak_naam" name="taak_naam" required><br>

    <label for="toegewezen_aan">Toewijzen aan:</label><br>
    <input type="text" id="toegewezen_aan" name="toegewezen_aan" required><br>

    <input type="submit" value="Toewijzen">
</form>

<!-- Succes- of Foutmelding -->
<?php
if (isset($success_message)) {
    echo "<div class='message'>$success_message</div>";
} elseif (isset($error_message)) {
    echo "<div class='error'>$error_message</div>";
}
?>

</body>
</html>
