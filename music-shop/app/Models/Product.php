<?php
namespace App\Models;

use PDO;

class Product extends Model
{
    public static function all()
    {
        $stmt = self::$db->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $stmt = self::$db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $stmt = self::$db->prepare("
            INSERT INTO products (title, price, stock, description)
            VALUES (:title, :price, :stock, :description)
        ");

        $stmt->execute([
            ':title'       => $data['title'],
            ':price'       => $data['price'],
            ':stock'       => $data['stock'],
            ':description' => $data['description'],
        ]);
    }

    // ✅ ПРАВИЛЬНИЙ update()
    public static function update($id, $data)
    {
        $stmt = self::$db->prepare("
            UPDATE products 
            SET title = :title,
                price = :price,
                stock = :stock,
                description = :description
            WHERE id = :id
        ");

        return $stmt->execute([
            ':title'       => $data['title'],
            ':price'       => $data['price'],
            ':stock'       => $data['stock'],
            ':description' => $data['description'],
            ':id'          => $id
        ]);
    }

    public static function delete($id)
    {
        $stmt = self::$db->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
}
