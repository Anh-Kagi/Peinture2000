<?php
require_once('./utils/database.php');
require_once('./models/user.php');

class UserService
{
    public static function getAllUsers()
    {
        $users = array();
        foreach (\Database::query("SELECT id, name, hash FROM user") as $row) {
            $users[] = new User($row["id"], $row["name"], $row["hash"], false);
        }
        return $users;
    }

    public static function getUser(string $name)
    {
        $params = array();
        $params[":name"] = $name;
        $row = \Database::query("SELECT id, name, hash from user WHERE name = :name", $params);
        return new User($row[0]["id"], $row[0]["name"], $row[0]["hash"], false);
    }

    public static function insertUser(User $user)
    {
        $params = array();
        $params[':name'] = $user->name;
        $params[':hash'] = $user->getHash();
        \Database::query("INSERT INTO user (name , hash) VALUES (:name , :hash)", $params);
    }

    public static function existsUser(string $name)
    {
        $params = array();
        $params[":name"] = $name;
        foreach (\Database::query("SELECT 1 FROM user WHERE name = :name", $params) as $row) {
            return true;
        }
        return false;
    }
}
