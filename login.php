<?php
require_once("utils/session.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("utils/auth.php");
    require_once("services/userService.php");
    require_once("models/user.php");

    if (!isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["register"])) {
        header("Location: {$_SERVER['REQUEST_URI']}", true, 400);
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
}

$title = 'Mon compte';
ob_start(); ?>
<h1>Mon Compte</h1>

<p>
    Vous êtes <?php echo isset($_SESSION["LOGGED"]) && $_SESSION["LOGGED"] ? "connecté" : "déconnecté"; ?>
</p>
<form method="post">
    <h1>Connexion</h1>
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" placeholder="Nom d'utilisateur" name="username" />

    <label for="username">Mot de passe:</label>
    <input type="password" placeholder="Mot de passe" name="password" />

    <input type="hidden" name="register" value="false" />
    <button type="submit">Connexion</button>
</form>

<form method="post">
    <h1>Register</h1>
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" placeholder="Nom d'utilisateur" name="username" />

    <label for="username">Mot de passe:</label>
    <input type="password" placeholder="Mot de passe" name="password" />

    <input type="hidden" name="register" value="true" />
    <button type="submit">Connexion</button>
</form>

<?php
$content = ob_get_clean();
require_once('./inc/template.php');
