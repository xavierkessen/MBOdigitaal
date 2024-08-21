<?php

// url: /admin/
// Dit is de controller-pagina wordt gebruikt om in te loggen op het
// adminpanel.

// Globale variablen en functies die op bijna alle pagina's
// gebruikt worden.
require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
require $_SERVER['DOCUMENT_ROOT'] . '/errors/default.php';

// 1. INLOGGEN CONTROLEREN
// Hier wordt gecontroleerd of de gebruiker is ingelogd en de juiste rechten
// heeft. De rollen "applicatiebeheerder" en "administrator" hebben toegang.
require $_SERVER['DOCUMENT_ROOT'] . '/models/Auth.php';
Auth::check(["applicatiebeheerder", "administrator"]);
Auth::checkResetPassword();

// 2. INPUT CONTROLEREN
// Controleren of de pagina is aangeroepen met behulp van form POST
// en of the variabelen wel bestaan.
// htmlspecialchars() wordt gebruikt om cross site scripting (xss) te voorkomen.

// 3. CONTROLLER FUNCTIES
// Hier vinden alle acties plaats die moeten gebeuren voordat een nieuwe pagina
// wordt getoond.

// 4. VIEWS OPHALEN (REDIRECT)
// Het view van het dashboard pagina wordt opgehaald.
$url = "/admin/users/overview";
header('Location: ' . $url, true);
exit();
