<?php
namespace auth;

function authenticate($username, $password) {
    $filename = "users.json";
    $file = fopen($filename, "r");
    $users = json_decode(fread($file, filesize($filename)), true);
    fclose($file);
    if (!array_key_exists($username, $users)) {
        return false;
    } else {
        if ($users[$username] == $password) {
            session_start();
            $_SESSION["LOGGED"] = true;
            return true;
        } else {
            return false;
        }
    }
}

function register($username, $password) {
    $filename = "users.json";
    $file = fopen($filename, "r");
    $users = json_decode(fread($file, filesize($filename)), true);
    fclose($file);
    if (array_key_exists($username, $users)) {
        return false;
    } else {
        $users[$username] = $password;
        $file = fopen($filename, "r");
        fwrite($file, json_encode($users));
        fclose($file);
        return authenticate($username, $password);
    }
}
