<?php

// url: /admin/roles/new
// Dit is de controller-pagina voor het formulier toevoegen van 
// een nieuwe role.

// Globale variablen en functies die op bijna alle pagina's
// gebruikt worden.
require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
require $_SERVER['DOCUMENT_ROOT'] . '/errors/default.php';

// 1. INLOGGEN CONTROLEREN
// Hier wordt gecontroleerd of de gebruiker is ingelogd en de juiste rechten
// heeft. De rollen "applicatiebeheerder" en "administrator" hebben toegang. 

// 2. INPUT CONTROLEREN
// Controleren of de pagina is aangeroepen met behulp van form POST
// en of the variabelen wel bestaan.
// htmlspecialchars() wordt gebruikt om cross site scripting te voorkomen.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verlnaam rolnaam opvangen en opslaan.
    if(isset($_POST["name"])) {
        $name = htmlspecialchars($_POST["name"]);
    }
    else {
        $errorMessage = "Rolnaam is niet ingevuld of ontbreekt.";
        callErrorPage($errorMessage, 400);
    }
    
    // Veldnaam level opvangen en opslaan.
    if(isset($_POST["level"])) {
        $level = htmlspecialchars($_POST["level"]);
    }
    else {
        $errorMessage = "Level is niet ingevuld of ontbreekt.";
        callErrorPage($errorMessage, 400);
    } 
}
else {
    $errorMessage = "De pagina is op onjuiste manier aangeroepen. Geen POST gebruikt.";
    callErrorPage($errorMessage, 400);
}

// 3. CONTROLLER FUNCTIES
// Hier vinden alle acties plaats die moeten gebeuren om de juiste
// informatie te bewerken.
require $_SERVER['DOCUMENT_ROOT'] . '/models/Roles.php';

$result = Role::insert(
    $name,
    $level
);

if ($result) {
    echo "Role met naam $name en level $level is toegevoegd.";
    $roles = Role::selectAll();
} else {
    echo "Toevoegen aan database niet gelukt.";
}

// 4. VIEWS OPHALEN
// De HTML-pagina (view) wordt hier opgehaald.
// $title is de titel van de html pagina.
$title = "Overzicht rollen";
$editmode = false;
$actionUrl = "/admin/roles/add";
// require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/roles/form.php';