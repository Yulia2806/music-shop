<?php
namespace App\Models;

use PDO;

class Page extends Model
{
    public static function all()
    {
        $stmt = self::$db->query("SELECT * FROM pages ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $stmt = self::$db->prepare("SELECT * FROM pages WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function findBySlug($slug)
    {
        $stmt = self::$db->prepare("SELECT * FROM pages WHERE slug = ? LIMIT 1");
        $stmt->execute([$slug]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }   

    public static function create($data)
    {
        $stmt = self::$db->prepare("INSERT INTO pages (title, slug, content) VALUES (?, ?, ?)");
        $stmt->execute([$data['title'], $data['slug'], $data['content']]);
    }

    public static function update($id, $data)
    {
        $stmt = self::$db->prepare("UPDATE pages SET title=?, slug=?, content=? WHERE id=?");
        $stmt->execute([$data['title'], $data['slug'], $data['content'], $id]);
    }

    public static function delete($id)
    {
        $stmt = self::$db->prepare("DELETE FROM pages WHERE id=?");
        $stmt->execute([$id]);
    }
}
