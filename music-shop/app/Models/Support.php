<?php
namespace App\Models;

use PDO;

class Support extends Model
{
    protected static string $table = 'support_messages';

    public static function getMessages()
    {
        return self::all();
    }

    public static function addMessage($message, $is_admin = 0)
    {
        $stmt = self::$db->prepare("
            INSERT INTO support_messages (message, is_admin)
            VALUES (?, ?)
        ");
        $stmt->execute([$message, $is_admin]);
    }
}
