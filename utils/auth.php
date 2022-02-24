<?php
namespace auth;

require_once("utils/session.php");
require_once("services/userService.php");
require_once("models/user.php");

function authenticate($username, $password) {
    if (!\UserService::existsUser($username)) {
        return false;
    } else {
        $user = \UserService::getUser($username);
        if ($user::verifyPassword($password)) {
            $_SESSION["LOGGED"] = true;
            return true;
        } else {
            return false;
        }
    }
}

function register($username, $password) {
    if (\UserService::existsUser($username)) {
        return false;
    } else {
        $user = new User(0, $username, $password);
        \UserService::insertUser($user);
        return authenticate($username, $password);
    }
}
