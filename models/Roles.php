<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Ramsey\Uuid\Uuid;

class Role
{
    // insert voegt één nieuwe rol toe aan de tabel role.
    // Er wordt een UUIDv4 gegeneert als unieke ID.
    // Deze UUID wordt opgeslagen string (niet de snelste methode).
    public static function insert(
        $name,
        $level,
    ) {
        $db = require $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

        // Generate a version 4 (random) UUID
        $roleId = Uuid::uuid4();
        
        $sql_insert_into_roles = "INSERT INTO role (id, name, level)
        VALUES (?, ?, ?);";
        
        $stmt = $db->prepare($sql_insert_into_roles);
        
        if ($stmt->execute([
            $roleId, 
            $name,
            $level,
            ])) {
                return true;
        } else {
            return false;
        }
    }

    // public static function select($id) {
    //     $db = require $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';

    //     $sql_select_education_by_id = "SELECT * FROM education WHERE id=?;";

    //     $stmt = $db->prepare($sql_select_education_by_id);

    //     if($stmt->execute([$id]) ){
    //         $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //         foreach ($educations as $education) {
    //             return $education;
    //         }
    //     }
    // }

    public static function selectAll() {
        $db = require $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

        $sql_selectAll_roles = "SELECT * FROM role;";
        
        $stmt = $db->prepare($sql_selectAll_roles);
        
        if($stmt->execute()){
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $roles;
        }
    }

    // public static function update(
    //     $id,
    //     $eduName,
    //     $institution,
    //     $graduationDate,
    //     $certificate
    // ){
    //     $db = require $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';

    //     $sql_update_education_by_id = "UPDATE education
    //     SET edu_name=?, institution=?, graduation_date=?, certificate=?
    //     WHERE id=?";

    //     $stmt = $db->prepare($sql_update_education_by_id);

    //     if ( $stmt->execute([
    //         $eduName,
    //         $institution,
    //         $graduationDate,
    //         $certificate,
    //         $id
    //     ]) ) {
    //         return true;
    //     } else {
    //         return false;
    //     }

    // }

    // public static function delete($id) {
    //     $db = require $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';

    //     $sql_delete_education_by_id = "DELETE FROM education WHERE id=?;";
    //     $stmt = $db->prepare($sql_delete_education_by_id);
    //     if( $stmt->execute([$id]) ) {
    //         return true;

    //     } else {
    //         return false;
    //     }

    // }
    
}