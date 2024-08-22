<?php

/* 
 * Dit is de controller-pagina van de homepage.
 * deze bestaat uit drie gedeeltes.
 * 1. Variabelen en database connectie ophalen.
 * 2. Acties die moeten worden opgehaald.
 * 3. View (html pagina) wordt opgehaald.
 */

// 1. VARIABELEN EN DATABASE CONNECTIE
require $_SERVER["DOCUMENT_ROOT"] . '/docroot.php';
require __DOCUMENTROOT__ . '/config/globalvars.php';
require __DOCUMENTROOT__ . '/errors/default.php';

// 2. ACTIES
// Er zijn nu geen acties.
// Een lijst van alle opleidingen wordt hier opgehaald.
require __DOCUMENTROOT__ . '/models/Educations.php';
$educations = Education::selectAll();

// 3. VIEWS OPHALEN
// De view voor de homepage wordt hier opgehaald.
// Dit wordt de titel van de homepagina.
$title = "Homepage MBOdigitaal";
require __DOCUMENTROOT__ . '/views/home.php';