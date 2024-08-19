<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$db = require_once $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

use Ramsey\Uuid\Uuid;

class Users
{
    // insert voegt één nieuwe gebruiker toe aan de tabel user.
    // Er wordt een UUIDv4 gegeneert als unieke ID.
    // Deze UUID wordt opgeslagen string (niet de snelste methode).
    public static function insert(
        $duoNumber,
        $firstName,
        $prefix,
        $lastName,
        $secret,
        $email,
        $phone,
        $changeSecretAtLogon,
        $enabled,
        $roleId,
        $educationId,
        $cohort,
    ) {
        $db = require $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

        $creationDate = date('Y-m-d H:i:s');
        $modificationDate = date('Y-m-d H:i:s');

        // Generate a version 4 (random) UUID
        $id = Uuid::uuid4();

        $sql_insert_into_users = "INSERT INTO user (id, duoNumber, firstName, prefix, lastName, secret, email, phone, changeSecretAtLogon, enabled, roleId, educationId, cohort, creationDate, modificationDate)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $encryptedSecret = password_hash($secret, PASSWORD_DEFAULT);

        $stmt = $db->prepare($sql_insert_into_users);

        if (
            $stmt->execute([
                $id,
                $duoNumber == "" ? 0 : (int)$duoNumber,
                $firstName,
                $prefix,
                $lastName,
                $encryptedSecret,
                $email,
                $phone,
                $changeSecretAtLogon,
                $enabled,
                $roleId,
                $educationId,
                $cohort = "" ? null : $cohort,
                $creationDate,
                $modificationDate
            ])
        ) {
            return true;
        } else {
            return false;
        }
    }

    // select selecteert één gebruiker op basis van een gegeven id.
    // Er wordt een associative array ($user["id"]) van de gebruiker gereturneerd.
    public static function select($id)
    {
        global $db;

        $sql_select_users_by_id = "SELECT * FROM user WHERE id=?;";

        $stmt = $db->prepare($sql_select_users_by_id);

        if ($stmt->execute([$id])) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $user) {
                return $user;
            }
        }
    }

    // selectAll selecteert alle gebruikers geordend op een zelf aangegeven waarde $orderBy.
    // Er wordt een associative array met meerdere rijen gereturneerd.
    // Deze functies returneert een x aantal records ($numberOfRecords). Default 100 records.
    // $offset zijn het aantal records dat hij overslaat. Default 0 records overslaan.
    public static function selectAll($orderBy, $numberOfRecords = 200, $offset = 0)
    {
        global $db;

        $sql_selectAll_users = "SELECT * FROM user ORDER by $orderBy LIMIT $numberOfRecords OFFSET $offset;";

        $stmt = $db->prepare($sql_selectAll_users);

        if ($stmt->execute()) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }
    }

    // update werkt de informatie van een record van een bepaalde id bij.
    // De functie returneerd true als dit gelukt is en false als het niet
    // gelukt is.
    public static function update(
        $id,
        $duoNumber,
        $firstName,
        $prefix,
        $lastName,
        $email,
        $phone,
        $changeSecretAtLogon,
        $enabled,
        $roleId,
        $educationId,
        $cohort
    ) {
        global $db;

        $modificationDate = date('Y-m-d H:i:s');

        $sql_update_user_by_id = "UPDATE user
        SET duoNumber=?, firstName=?, prefix=?, lastName=?, email=?, phone=?, changeSecretAtLogon=?, enabled=?, roleId=?, educationId=?, cohort=?, modificationDate=?
        WHERE id=?";

        $stmt = $db->prepare($sql_update_user_by_id);

        if (
            $stmt->execute([
                $duoNumber,
                $firstName,
                $prefix,
                $lastName,
                $email,
                $phone,
                $changeSecretAtLogon,
                $enabled,
                $roleId,
                $educationId,
                $cohort,
                $modificationDate,
                $id
            ])
        ) {
            return true;
        } else {
            return false;
        }

    }

    // delete verwijdert een record uit de tabel user met een bepaald id.
    // De functie returneert true als dit gelukt is en false als dit niet gelukt is.
    public static function delete($id)
    {
        global $db;

        $sql_delete_user_by_id = "DELETE FROM user WHERE id=?;";
        $stmt = $db->prepare($sql_delete_user_by_id);
        if ($stmt->execute([$id])) {
            return true;

        } else {
            return false;
        }
    }

    public static function changeSecret($id, $newSecret) {
        global $db;

        $modificationDate = date('Y-m-d H:i:s');
        $encryptedSecret = password_hash($newSecret, PASSWORD_DEFAULT);

        $sql_update_user_secret_by_id = "UPDATE user
        SET secret=?, modificationDate=?
        WHERE id=?";

        $stmt = $db->prepare($sql_update_user_secret_by_id);

        if (
            $stmt->execute([
                $encryptedSecret,
                $modificationDate,
                $id
            ])
        ) {
            return true;
        } else {
            return false;
        }

    }

}