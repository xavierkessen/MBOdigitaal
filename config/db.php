<?php

$host = "localhost";                // Domainnaam van de computer.
$db = "mbogodigital";                // Naam van de MySQL database.
$user = "mbogodigitalUser";          // Gebruikersnaam die toegang heeft tot de database.
$password = "Vrieskist@247";        // Wachtwoord van de gebruiker.

/*
 * MAAK EEN GEBRUIKER AAN IN MYSQL
 * 
 * Deze commando's kun je ook runnen in phpMyAdmin.
 * 
 * Database aanmaken:
 * CREATE DATABASE mbogodigital;
 * 
 * MySQL gebruiker aanmaken:
 * CREATE USER 'mbogodigitalUser'@'localhost' identified by 'Vrieskist@247';
 * 
 * MySQL gebruiker toegang geven tot de database:
 * GRANT ALL PRIVILEGES ON mbogodigital.* TO 'mbogodigitallUser'@'localhost';
 * 
 * Nieuwe gebruiker activeren:
 * FLUSH PRIVILEGES;
 * 
 */

 /* 
  * TODO
  * Het is beter om hier omgevingsvariabelen te gebruiken ipv van de gegevens (met wachtwoord)
  * hier in de code te zetten.
  *
  * Zo moet de code er dan uiteindelijk uitzien.
  * $host = getenv('HOST');
  * $db = getenv('DB');
  * $user = getenv('USER');
  * $password = getenv('PASSWORD');
  */
