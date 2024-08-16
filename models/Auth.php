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

            if (!$user) {
                callLoginPage("Er is geen gebruiker gevonden met dit emailadres.");
            }

            // Controleren of het gegeven wachtwoord overeen komt het het opgeslagen
            // wachtwoord.
            if (password_verify($secret, $user['secret'])) {

                $jwtkey = "ClqFN0FlSkOHsyr8OVcowv8YMRSQLtRdJaJ3laoOkRbG0MyQXMXU6xmUdD1vBVj3";
                // Aanmaken van de Jason Webtoken (JWT).
                // Geldigheid van het token is 1 uur.

                require $_SERVER['DOCUMENT_ROOT'] . '/models/Roles.php';
                $role = Role::select($user["roleId"]);

                $token = JWT::encode(
                    array(
                        'iat' => time(),
                        'nbf' => time(),
                        'exp' => time() + 8 * 3600,
                        'data' => array(
                            'id' => $user['id'],
                            'roleName' => $role['name']
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
                callLoginPage("U inloggevens zijn niet juist.");
            }
        } else {
            callErrorPage("Het is niet gelukt om uw gegevens te controleren.");
        }
    }

    public static function check($roles)
    {
        if (isset($_COOKIE['token'])) {
            $token = $_COOKIE['token'];
            $jwtkey = "ClqFN0FlSkOHsyr8OVcowv8YMRSQLtRdJaJ3laoOkRbG0MyQXMXU6xmUdD1vBVj3";
            $decoded = JWT::decode($token, new Key($jwtkey, 'HS256'));

            // Controleren of het token nog geldig is.
            $exp = (int) $decoded->exp;

            if ($exp < time()) {
                callLoginPage("U moet opnieuw inloggen. Uw sessie is verlopen.");
            }

            // Controleren of de rol van de gebruiker is toegestaan.
            $tokenRole = $decoded->data->roleName;
            foreach ($roles as $role) {
                if (
                    strtolower($tokenRole) === strtolower($role)
                ) {
                    return true;
                }

            }

            callLoginPage("U hebt niet de juiste rechten om deze pagina te bezoeken.");

        } else {
            callLoginPage("U bent niet ingelogd.");
        }
    }

    public static function logout()
    {
        setcookie("token", "", time() - 8 * 3600, "/", "", true, true);
    }
}