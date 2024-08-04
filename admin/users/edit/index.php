<?php

// url: /admin/auth/users/edit
//
// Dit is de controller-pagina voor het toevoegen van een
// een nieuwe gebruiker.

// 1. VARIABELEN EN DATABASE CONNECTIE
require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
$db = require __DOCUMENTROOT__ . '/database/dbconnection.php';

// 2. AFKOMST EN INPUT CONTROLEREN EN OPVANGEN
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
echo $errorMessage;


// 2. ACTIES
// Er zijn nu geen acties.


// 3. VIEWS OPHALEN
// De view voor de homepage wordt hier opgehaald.
// Dit wordt de titel van de homepagina.
// Als $editmode true is dan wordt het formulier gebruikt om te 
// bewerken. Anders voor het toevoegen van een nieuwe gebruiker.
// $title is de titel van de html pagina. 
$editmode = true;
$title = "Gebruikers beheren";
require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/auth/form.php';