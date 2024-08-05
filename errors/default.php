<?php
function callErrorPage($errorMessage, $errorCode)
{
    $urlErrorPage = "/errorpage?message=$errorMessage";
    header('Location: ' . $urlErrorPage, true);
    exit();
}