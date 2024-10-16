<?php
session_start(); // Start the session

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database connection
    require_once "student.php"; // File for database connection
    
    $sql = "SELECT email, wachtwoord FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        // Set parameters
        $param_email = trim($_POST["email"]);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Store result
            mysqli_stmt_store_result($stmt);

            // Check if email exists, then verify password
            if (mysqli_stmt_num_rows($stmt) == 1) {                    
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $email, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify(trim($_POST["password"]), $hashed_password)) {
                        // Password is correct, start a new session
                        session_start();

                        // Save data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["email"] = $email;

                        // Debugging: Check session ID and session path
                        echo "Session ID: " . session_id() . "<br>";
                        echo "Session save path: " . session_save_path() . "<br>";
                        echo "Session loggedin: " . $_SESSION["loggedin"] . "<br>";
                        echo "Session email: " . $_SESSION["email"] . "<br>";
                        echo "Session cookie params: "; 
                        print_r(session_get_cookie_params());
                        echo "<br>";

                        // Redirect user to student page
                        header("location: student.php");
                        exit;
                    } else {
                        // Show an error message if password is not valid
                        $login_err = "Invalid email or password.";
                    }
                }
            } else {
                // Show an error message if email doesn't exist
                $login_err = "No account found with that email.";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>
<?php 
if(!empty($login_err)){
    echo '<p>' . $login_err . '</p>';
} 
?>

<form action="student.php" method="post">
    <label>Email</label>
    <input type="email" name="email" required><br>
    
    <label>Password</label>
    <input type="password" name="password" required><br>
    
    <input type="submit" value="Login">
</form>

</body>
</html>
