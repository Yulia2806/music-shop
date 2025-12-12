<?php
namespace App\Models;

use PDO;

abstract class Model
{
    protected static PDO $db;
    protected static string $table = ''; // ← ім'я таблиці

    static function init($c)
    {
        self::$db = new PDO(
            "mysql:host={$c['host']};dbname={$c['dbname']};charset={$c['charset']}",
            $c['user'],
            $c['pass'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    // ====== BASE METHODS ======

    // Отримати всі записи
    public static function all()
    {
        $tbl = static::$table;
        $stmt = self::$db->query("SELECT * FROM $tbl ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Отримати один запис
    public static function find($id)
    {
        $tbl = static::$table;
        $stmt = self::$db->prepare("SELECT * FROM $tbl WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Видалити запис
    public static function delete($id)
    {
        $tbl = static::$table;
        $stmt = self::$db->prepare("DELETE FROM $tbl WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
