<?php
require_once('./utils/database.php');
require_once('./models/shade.php');

class ShadeService
{
    public static function getAllShades()
    {
        $shades = array();
        foreach (Database::query("SELECT id, name FROM shade") as $row) {
            $shades[] = new Shade($row["id"], $row["name"]);
        }
        return $shades;
    }
}
