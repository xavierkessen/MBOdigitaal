<?php

// url: /admin/users/overview
// Dit is de controller-pagina voor het genereren van een overzicht
// van alle gebruikers.

// Globale variabelen en functies die op bijna alle pagina's
// gebruikt worden.
require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
require $_SERVER['DOCUMENT_ROOT'] . '/errors/default.php';

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
require $_SERVER['DOCUMENT_ROOT'] . '/models/Users.php';

$users = Users::selectAll("lastName");

// echo "<pre>";
// print_r($users);
// echo "</pre>";

// Controleren of het gelukt is om een opleiding toe te voegen aan de database.
// if (!$educations) {
//     $message = "Het is niet gelukt om alle opleidingen op te halen uit de database.";
//     callErrorPage($message);
// }


// 4. VIEWS OPHALEN
// De HTML-pagina (view) wordt hier opgehaald.
// $title is de titel van de html pagina.
$newUrl = "/admin/users/new";
$deleteUrl = "/admin/users/delete";
$changeSecretUrl = "/admin/users/changesecret";
$detailUrl = "/admin/users/detail";
$title = "Overzicht gebruikers";
require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/users/overview.php';