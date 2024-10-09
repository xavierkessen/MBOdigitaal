<?php
session_start(); // Start de sessie

// Verwerk de data van het formulier na het versturen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Maak een SELECT-query klaar
    require_once "student.php"; // Database connectiebestand
    $sql = "SELECT email, wachtwoord FROM users WHERE email = ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variabelen aan het prepared statement als parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        
        // Zet parameters
        $param_email = trim($_POST["email"]);
        
        // Voer het prepared statement uit
        if (mysqli_stmt_execute($stmt)) {
            // Bewaar resultaat
            mysqli_stmt_store_result($stmt);
            
            // Controleer of email bestaat, zo ja dan verifieer wachtwoord
            if (mysqli_stmt_num_rows($stmt) == 1) {                    
                // Bind result variabelen
                mysqli_stmt_bind_result($stmt, $email, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify(trim($_POST["password"]), $hashed_password)) {
                        // Wachtwoord is correct, start een nieuwe sessie
                        session_start();
                        
                        // Sla gegevens op in sessievariabelen
                        $_SESSION["loggedin"] = true;
                        $_SESSION["email"] = $email;                            
                        
                        // Stuur gebruiker naar welkomstpagina
                        header("location: welcome.php");
                        exit;
                    } else {
                        // Toon een foutmelding als wachtwoord niet klopt
                        $login_err = "Ongeldige email of wachtwoord.";
                    }
                }
            } else {
                // Toon een foutmelding als email niet bestaat
                $login_err = "Ongeldige email of wachtwoord.";
            }
        } else {
            echo "Oeps! Er ging iets mis. Probeer het later opnieuw.";
        }

        // Sluit statement
        mysqli_stmt_close($stmt);
    }
    
    // Sluit connectie
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-4">Inloggen</h2>
        <?php if (isset($fout) || isset($login_err)) : ?>
            <p class="text-red-600 text-center mb-4"><?php echo $fout ?? $login_err; ?></p>
        <?php endif; ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-6">
            <div>
                <label for="gebruikersnaam" class="block text-gray-700 font-bold mb-2"> E-mail:</label>
                <input type="text" name="gebruikersnaam" id="gebruikersnaam" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div>
                <label for="wachtwoord" class="block text-gray-700 font-bold mb-2">Wachtwoord:</label>
                <input type="password" name="wachtwoord" id="wachtwoord" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" value="Inloggen"
                    class="bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300 ease-in-out">
            </div>
        </form>
    </div>
</body>
</html>

</html>
