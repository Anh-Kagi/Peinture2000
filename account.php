<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //update du client puis redirection vers cette page en GET
    header("Location: {$_SERVER['REQUEST_URI']}", true, 303);
}

$title = 'Mon compte';

ob_start(); ?>

<h1>Mon Compte</h1>

<form method="post">
    <input type="submit" class="btn btn-primary" value="Valider" />
</form>

<?php
$content = ob_get_clean();
require_once('./inc/template.php');
