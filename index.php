<?php

require $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
$db = require $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

$title = "Homepage MBOdigitaal 2";
require $_SERVER['DOCUMENT_ROOT'] . '/views/home.php';