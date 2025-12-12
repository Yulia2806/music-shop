<?php
namespace App\Models;

use PDO;

class Support extends Model
{
    protected static string $table = 'support_messages';

    // Отримати всі повідомлення
    public static function getMessages()
    {
        $tbl = static::$table;
        $stmt = self::$db->query("SELECT * FROM $tbl ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Додати повідомлення
    public static function addMessage($message, $is_admin = 0)
    {
        $tbl = static::$table;

        $stmt = self::$db->prepare("
            INSERT INTO $tbl (message, is_admin, created_at)
            VALUES (?, ?, NOW())
        ");

        return $stmt->execute([$message, $is_admin]);
    }
}
