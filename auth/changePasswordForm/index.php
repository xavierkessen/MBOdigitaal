<?php

// url: /auth/changePassword
// Dit is de controller-pagina inloggen van een gebruiker
// gebruiker afkomstig van het formulier /auth/loginform

// Globale variablen en functies die op bijna alle pagina's
// gebruikt worden.
require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
require $_SERVER['DOCUMENT_ROOT'] . '/errors/default.php';

// 1. INLOGGEN CONTROLEREN
// Hier wordt gecontroleerd of de gebruiker is ingelogd.
// Alleen de gebruiker zelf mag zijn eigen wachtwoord wijzigen. 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Veldnaam id opvangen en opslaan.
    if (isset($_POST["id"])) {
        $id = htmlspecialchars($_POST["id"]);
    } else {
        $errorMessage = "id is niet ingevuld of ontbreekt.";
        callErrorPage($errorMessage);
    }
}
require $_SERVER['DOCUMENT_ROOT'] . '/models/Auth.php';
Auth::check(["23a4b3e7-9e01-47b7-b73a-ce7544379d89"]);

// 2. INPUT CONTROLEREN
// Controleren of de pagina is aangeroepen met behulp van form POST
// en of the variabelen wel bestaan.
// htmlspecialchars() wordt gebruikt om cross site scripting (xss) te voorkomen.


// 3. CONTROLLER FUNCTIES
// Hier vinden alle acties plaats die moeten gebeuren om de gebruiker het formulier te laten zien.


// 4. VIEWS OPHALEN (REDIRECT)
// 
$title = "Wachtwoord resetten";
$actionUrl = "/auth/changePassword";
require $_SERVER['DOCUMENT_ROOT'] . '/views/admin/auth/changePasswordForm.php';

