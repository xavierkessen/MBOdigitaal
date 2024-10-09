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
            margin: 0;
            padding: 0;
        }

        /* Navigatiebalk */
        .navbar {
            background-color: #007BFF;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar .button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar .button:hover {
            background-color: #0056b3;
        }

        /* Uitlog knop */
        .logout-container {
            text-align: center;
            margin: 40px 0;
        }

        .logout-button {
            background-color: #FF0000;
            color: white;
            border: none;
            padding: 15px 25px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #CC0000;
        }

        /* Minimalistisch uiterlijk met flexbox voor de inhoud */
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 130px); /* Houd ruimte vrij voor de navigatiebalk en uitlog knop */
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Navigatiebalk bovenaan -->
<div class="navbar">
    <button class="button" onclick="window.location.href='opleidingen.php'">Opleidingen</button>
    <button class="button" onclick="window.location.href='cohorten.php'">Cohorten</button>
    <button class="button" onclick="window.location.href='klassen.php'">Klassen</button>
    <button class="button" onclick="window.location.href='student.php'">Studenten</button>
    <button class="button" onclick="window.location.href='docent.php'">Docenten</button>
    <button class="button" onclick="window.location.href='mentor.php'">Mentoren</button>
    <button class="button" onclick="window.location.href='levels.php'">Levels</button>
    <button class="button" onclick="window.location.href='toewijzen.php'">Toewijzen</button>
</div>

<!-- Hoofdinhoud -->
<div class="content">
    <h2>Welkom bij het School Management Systeem</h2>
</div>

<!-- Uitlog knop onderaan -->
<div class="logout-container">
    <button class="logout-button" onclick="window.location.href='?logout=true'">Uitloggen</button>
</div>

</body>
</html>
