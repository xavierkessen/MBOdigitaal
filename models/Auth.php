<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/globalvars.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/errors/default.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\key;

class Auth
{
    // login controleert de gebruikersnaam (emailadres) en het wachtwoord (secret)
    // die de gebruiker heeft ingevuld in het formulier.
    // login maakt ook een cookie aan. Cookie is 1 uur geldig.
    // functie retureert true als het goed gaat.
    public static function login($email, $secret)
    {
        $db = require $_SERVER['DOCUMENT_ROOT'] . '/database/dbconnection.php';

        $sql_select_user_by_email = "SELECT * FROM user WHERE email=?";

        $stmt = $db->prepare($sql_select_user_by_email);

        // Gebruiker wordt opgezocht in de user tabel.
        // Als de gebruiker bestaat daarna wordt het wachtwoord gecontroleerd.
        if ($stmt->execute([$email])) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $user = $users[0];

            // Controleren of het gegeven wachtwoord overeen komt het het opgeslagen
            // wachtwoord.
            if (password_verify($secret, $user['secret'])) {

                $jwtkey = "ClqFN0FlSkOHsyr8OVcowv8YMRSQLtRdJaJ3laoOkRbG0MyQXMXU6xmUdD1vBVj3";
                // Aanmaken van de Jason Webtoken (JWT).
                // Geldigheid van het token is 1 uur.
                $token = JWT::encode(
                    array(
                        'iat' => time(),
                        'nbf' => time(),
                        'exp' => time() + 3600,
                        'data' => array(
                            'id' => $user['id'],
                            'roleId' => $user['roleId'],
                            'educationId' => $user['educationId']
                        )
                    ),
                    $jwtkey,
                    'HS256'
                );

                // JWT wordt opgeslagen in de cookies van de gebruiker.
                setcookie(
                    "token",
                    $token,
                    time() + 3600,
                    "/",
                    "",
                    true,
                    true
                );
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function check($roles) {
        if(isset($_COOKIE['token'])){
            $token = $_COOKIE['token'];
            $jwtkey = "ClqFN0FlSkOHsyr8OVcowv8YMRSQLtRdJaJ3laoOkRbG0MyQXMXU6xmUdD1vBVj3";
            $decoded = JWT::decode($token, new Key($jwtkey, 'HS256'));
            echo $decoded->data->roleId;
            foreach ($roles as $role) {
                echo $role;
            }
        } else {
            callErrorPage("U bent niet ingelogd.");
        }
    }

    public static function logout() {
        setcookie("token", "", time() - 3600, "/", "", true, true);
    }
}