<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location: login.php");
    exit;
}

// Functie om uit te loggen
if (isset($_GET['logout'])) {
    // Vernietig alle sessiegegevens
    session_unset();
    session_destroy();

    // Stuur de gebruiker terug naar de loginpagina
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 15px 25px;
            margin: 10px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .logout-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logout-button {
            background-color: #FF0000;
        }
        .logout-button:hover {
            background-color: #CC0000;
        }
    </style>
</head>
<body>

<div class="container">
    <button class="button" onclick="window.location.href='opleidingen.php'">Opleidingen</button>
    <button class="button" onclick="window.location.href='cohorten.php'">Cohorten</button>
    <button class="button" onclick="window.location.href='klassen.php'">Klassen</button>
    <button class="button" onclick="window.location.href='studenten.php'">Studenten</button>
    <button class="button" onclick="window.location.href='docent.php'">Docenten</button>
    <button class="button" onclick="window.location.href='mentor.php'">Mentoren</button>
    <button class="button" onclick="window.location.href='levels.php'">Levels</button>
    <button class="button" onclick="window.location.href='toewijzen.php'">Toewijzen</button>
</div>

<!-- Uitlog knop aan de onderkant -->
<div class="logout-container">
    <button class="button logout-button" onclick="window.location.href='?logout=true'">Uitloggen</button>
</div>

</body>
</html>
