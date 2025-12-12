<?php
namespace App\Models;

use PDO;

class News extends Model
{
    public static function all()
    {
        $stmt = self::$db->query("SELECT * FROM news ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $title   = trim($data['title']   ?? '');
        $content = trim($data['content'] ?? ($data['text'] ?? ''));

        if ($title === '' || $content === '') {
            throw new \InvalidArgumentException('Title and content are required.');
        }

        $stmt = self::$db->prepare("
            INSERT INTO news (title, content) 
            VALUES (:title, :content)
        ");

        return $stmt->execute([
            ':title'   => $title,
            ':content' => $content
        ]);
    }

    public static function delete($id)
    {
        $stmt = self::$db->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function find($id)
    {
        $stmt = self::$db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $data)
    {
        $title   = trim($data['title']   ?? '');
        $content = trim($data['content'] ?? ($data['text'] ?? ''));

        if ($title === '' || $content === '') {
            throw new \InvalidArgumentException('Title and content are required.');
        }

        $stmt = self::$db->prepare("
            UPDATE news
            SET title = :title, content = :content
            WHERE id = :id
        ");

        return $stmt->execute([
            ':title'   => $title,
            ':content' => $content,
            ':id'      => $id
        ]);
    }
}
