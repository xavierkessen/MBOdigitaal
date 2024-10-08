<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['gebruikersnaam'])) {
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
        }
        .container {
            width: 100%;
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

</body>
</html>