<?php

// url: /admin/roles/overview
// Dit is de controller-pagina voor het genereren van een overzicht
// van alle rollen.

// Globale variablen en functies die op bijna alle pagina's
// gebruikt worden.
require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';

// 1. INLOGGEN CONTROLEREN
// Hier wordt gecontroleerd of de gebruiker is ingelogd en de juiste rechten
// heeft. De rollen "applicatiebeheerder" en "administrator" hebben toegang.

// 2. INPUT CONTROLEREN
// Controleren of de pagina is aangeroepen met behulp van een link (GET).
// Op dit moment hier niet van toepassing.
// Na het bewerken van 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Message afkomst van andere pagina.
    if(isset($_GET["message"])) {
        $message = htmlspecialchars($_GET["message"]);
    }
}

// 3. CONTROLLER FUNCTIES
// Hier vinden alle acties plaats die moeten gebeuren om de juiste
// informatie te bewerken.
require $_SERVER['DOCUMENT_ROOT'] . '/models/Roles.php';

$roles = Role::selectAll();

// Controleren of het gelukt is om een rol toe te voegen aan de database.
if (!$roles) {
    $message = "Het is niet gelukt om alle rollen op te halen uit de database.";
    callErrorPage($message);
}

// echo "<pre>";
// print_r($roles);
// echo "</pre>";

// 4. VIEWS OPHALEN
// De HTML-pagina (view) wordt hier opgehaald.
// $title is de titel van de html pagina.
$newUrl = "/admin/educations/new";
$title = "Overzicht opleidingen";
require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/educations/overview.php';