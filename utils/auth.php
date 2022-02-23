<?php
namespace auth;

function authenticate($username, $password) {
    $filename = $_SERVER["DOCUMENT_ROOT"]."\\users.json";
    $file = fopen($filename, "r");
    $users = json_decode(fread($file, filesize($filename)));
    $fclose($file);
    if (!isset($users[$username])) {
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
    $filename = $_SERVER["DOCUMENT_ROOT"]."/users.json";
    $file = fopen($filename, "r");
    $users = json_decode(fread($file, filesize($filename)));
    $fclose($file);
    if (isset($users[$username])) {
        return false;
    } else {
        $users[$username] = $password;
        $file = fopen($filename, "r");
        fwrite($file, json_encode($users));
        $fclose($file);
        return authenticate($username, $password);
    }
}
