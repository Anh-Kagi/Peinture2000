<?php
namespace auth;

require_once("utils/session.php");
require_once("services/userService.php");
require_once("models/user.php");

function authenticate($username, $password)
{
    if (!\UserService::existsUser($username)) {
        return false;
    } else {
        $user = \UserService::getUser($username);
        if ($user->verifyPassword($password)) {
            header("Location: " . $_SERVER["REQUEST_URI"], true, 302);
            var_dump($_SESSION);
            $_SESSION["LOGGED"] = true;
            var_dump($_SESSION);
            return true;
        } else {
            return false;
        }
    }
}

function register($username, $password)
{
    if (\UserService::existsUser($username)) {
        return false;
    } else {
        $user = new \User(0, $username, $password, true);
        \UserService::insertUser($user);
        return authenticate($username, $password);
    }
}
