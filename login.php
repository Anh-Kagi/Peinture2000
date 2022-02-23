<?php
session_start();

include("utils/auth.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["username"]) || !isset($_POST["password"] || !isset($_POST["register"]))) {
        header("Location: /login.php");
        http_response_code(400);
        exit();
    } else {
        if ($_POST["register"] == "true") {
            $result = \auth\register($_POST["username"], $_POST["password"]);
            if (!$result) {
                http_response_code(400);
            }
        } else {
            $result = \auth\authenticate($_POST["username"], $_POST["password"]);
            if (!$result) {
                http_response_code(400);
            }
        }
        exit();
    }
} else { ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8"/>
        <title>Peinture2000 - Connexion</title>
    </head>
    <body>
        <p>
            Vous êtes <?php echo isset($_SESSION["LOGGED"]) && $_SESSION["LOGGED"] ? "connecté" : "déconnecté"; ?>
        </p>
        <form method="post">
            <h1>Connexion</h1>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" placeholder="Nom d'utilisateur" name="username"/>
            
            <label for="username">Mot de passe:</label>
            <input type="password" placeholder="Mot de passe" name="password"/>

            <input type="hidden" name="register" value="false"/>
            <button type="submit">Connexion</button>
        </form>
        
        <form method="post">
            <h1>Register</h1>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" placeholder="Nom d'utilisateur" name="username"/>
            
            <label for="username">Mot de passe:</label>
            <input type="password" placeholder="Mot de passe" name="password"/>

            <input type="hidden" name="register" value="true"/>
            <button type="submit">Connexion</button>
        </form>
    </body>
</html>

<?php }