<?php
// Verberg alle fouten
error_reporting(0);
ini_set('display_errors', 0);

// Verbinding maken met de database
$host = "mysql"; 
$db = "mbogodigital"; 
$user = "mbogodigitalUser"; 
$pass = "Vrieskist@247"; 

try {
    // PDO verbinding maken met de juiste variabelen
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kan geen verbinding maken met de database: " . $e->getMessage());
}

// Haal alle keuzedelen op uit de database
try {
    $keuzedelen_stmt = $pdo->query("SELECT id, naam FROM keuzedelen");
    $keuzedelen = $keuzedelen_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Toon een foutmelding als er geen keuzedelen zijn
    if (count($keuzedelen) == 0) {
        echo "<p style='color: red;'>Geen keuzedelen gevonden in de database.</p>";
    }

} catch (PDOException $e) {
    die("Fout bij het ophalen van de keuzedelen: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuzedeel Selecteren</title>
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
        select, input[type="submit"] {
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

<h2>Keuzedeel Selecteren</h2>

<!-- Keuzedeel Selecteren Formulier -->
<form action="student.php" method="POST">
    <label for="keuzedeel">Keuzedeel:</label><br>
    <select id="keuzedeel" name="keuzedeel_id" required>
        <option value="">-- Selecteer een keuzedeel --</option>
        <?php if (!empty($keuzedelen)): ?>
            <?php foreach ($keuzedelen as $keuzedeel): ?>
                <option value="<?= $keuzedeel['id'] ?>"><?= $keuzedeel['naam'] ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select><br>

    <input type="submit" value="Keuzedeel kiezen">
</form>

</body>
</html>
