<?php
function callErrorPage($errorMessage)
{
    $urlErrorPage = "/errorpage?message=$errorMessage";
    header('Location: ' . $urlErrorPage, true);
    exit();
}

function callLoginPage($errorMessage)
{
    $urlLoginPage = "/admin/auth/login?message=$errorMessage";
    header('Location: ' . $urlLoginPage, true);
    exit();
}