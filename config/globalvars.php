<?php
$title = "MBO Go Digital";            // Standaard titel van iedere pagina.

define("__DOCUMENTROOT__", $_SERVER["DOCUMENT_ROOT"]);
// De root van de website omgezet
// naar een constante: __DOCUMENTROOT__

function callErrorPage($errorMessage, $errorCode) {
    $urlErrorPage = "/error";
    header('Location: ' . $urlErrorPage, true, $errorCode);
    exit();
};