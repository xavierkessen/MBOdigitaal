<?php

$host = "localhost";                // Domainnaam van de computer.
$db = "mbodigitaal";                // Naam van de MySQL database.
$user = "MBOdigitaalUser";          // Gebruikersnaam die toegang heeft tot de database.
$password = "Vrieskist@247";        // Wachtwoord van de gebruiker.

/*
 * MAAK EEN GEBRUIKER AAN IN MYSQL
 * 
 * Deze commando's kun je ook runnen in phpMyAdmin.
 * 
 * Database aanmaken:
 * CREATE DATABASE mbodigitaal;
 * 
 * MySQL gebruiker aanmaken:
 * CREATE USER 'MBOdigitaalUser'@'localhost' identified by 'Vrieskist@247';
 * 
 * MySQL gebruiker toegang geven tot de database:
 * GRANT ALL PRIVILEGES ON 'mbodigitaal.* TO 'MBOdigitaalUser'@'localhost';
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
