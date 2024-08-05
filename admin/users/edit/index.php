<?php

// url: /admin/auth/users/edit
//
// Dit is de controller-pagina voor het toevoegen van een
// een nieuwe gebruiker.

// Globale variablen en functies die op bijna alle pagina's
// gebruikt worden.
require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
require $_SERVER['DOCUMENT_ROOT'] . '/errors/default.php';

// 2. INPUT CONTROLEREN EN OPVANGEN
// Controleren of de pagina is aangeroepen met behulp van een link (GET).
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    else {
        $errorMessage = "ID ontbreekt. Er is geen ID meegegeven.";
        callErrorPage($errorMessage, 400);
    } 
}
else {
    $errorMessage = "De pagina is op onjuiste manier aangeroepen.";
    callErrorPage($errorMessage, 400);
}

// 2. ACTIES
// Er zijn nu geen acties.
$db = require __DOCUMENTROOT__ . '/database/dbconnection.php';


// 3. VIEWS OPHALEN
// De view voor de homepage wordt hier opgehaald.
// Dit wordt de titel van de homepagina.
// Als $editmode true is dan wordt het formulier gebruikt om te 
// bewerken. Anders voor het toevoegen van een nieuwe gebruiker.
// $title is de titel van de html pagina. 
$editmode = true;
$title = "Gebruikers beheren";
require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/auth/form.php';