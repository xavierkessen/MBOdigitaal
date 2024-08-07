<?php

// Pad waar de database setup in staat.
$sqlFile = 'setup.sql';

try {
    // Connect to MySQL database using PDO
    $db = require $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Read the SQL file
    $sql = file_get_contents($sqlFile);

    if ($sql === false) {
        throw new Exception('Error reading SQL file');
    }

    // Execute the SQL commands
    $db->exec($sql);
    echo 'SQL file imported successfully';
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'General error: ' . $e->getMessage();
}
