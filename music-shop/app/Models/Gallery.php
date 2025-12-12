<?php
namespace App\Models;

class Gallery extends Model
{
    protected static string $table = 'gallery';

    public static function all()
    {
        $stmt = self::$db->query("SELECT * FROM gallery ORDER BY sort_order ASC, id DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $stmt = self::$db->prepare("SELECT * FROM gallery WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $stmt = self::$db->prepare("
            INSERT INTO gallery (filename, description, alt_text, sort_order)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([
            $data['filename'],
            $data['description'] ?? null,
            $data['alt_text'] ?? null,
            $data['sort_order'] ?? 0
        ]);
    }

    public static function update($id, $data)
    {
        $stmt = self::$db->prepare("
            UPDATE gallery 
            SET description=?, alt_text=?, sort_order=? 
            WHERE id=?
        ");
        return $stmt->execute([
            $data['description'],
            $data['alt_text'],
            $data['sort_order'],
            $id
        ]);
    }

    public static function delete($id)
    {
        $stmt = self::$db->prepare("DELETE FROM gallery WHERE id=?");
        $stmt->execute([$id]);
    }
}
