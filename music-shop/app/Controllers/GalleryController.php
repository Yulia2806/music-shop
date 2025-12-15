<?php
namespace App\Controllers;

use App\Models\Gallery;
use App\Core\Auth;

class GalleryController extends BaseController
{
    public function index()
    {
        $photos = Gallery::all();
        return $this->render('gallery', compact('photos'));
    }

    // --- ADMIN LIST ---
    public function adminIndex()
    {
        $this->checkAdmin();

        $photos = Gallery::all();

        return $this->render('admin/gallery/index', [
            'photos' => $photos
        ]);
    }

    // --- UPLOAD ---
    public function upload()
{
    $this->checkAdmin();

    if (!empty($_FILES['photo']['name'])) {

        $name = time() . "_" . basename($_FILES['photo']['name']);

        // ✅ АБСОЛЮТНИЙ ШЛЯХ до папки
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/gallery/';

        // ✅ якщо папки нема — створюємо
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $path = $targetDir . $name;

        // ✅ переміщуємо файл
        move_uploaded_file($_FILES['photo']['tmp_name'], $path);

        // зберігаємо тільки ІМʼЯ файлу в БД
        Gallery::create([
            'filename' => $name
        ]);
    }

    header("Location: /?r=admin-gallery");
    exit;
}


    public function adminEdit()
{
    $this->checkAdmin();

    if (empty($_GET['id'])) {
        die("Missing ID");
    }

    $photo = Gallery::find($_GET['id']);

    return $this->render('admin/gallery/edit', [
        'photo' => $photo
    ]);
}

public function update()
{
    $this->checkAdmin();

    Gallery::update($_POST['id'], [
        'description' => $_POST['description'],
        'alt_text'    => $_POST['alt_text'],
        'sort_order'  => $_POST['sort_order']
    ]);

    header("Location: /?r=admin-gallery");
    exit;
}


    // --- DELETE ---
    public function delete()
    {
        $this->checkAdmin();

        if (!empty($_GET['id'])) {
            $photo = Gallery::find($_GET['id']);

            if ($photo) {
                unlink("uploads/gallery/" . $photo['filename']);
                Gallery::delete($_GET['id']);
            }
        }

        header("Location: /?r=admin-gallery");
        exit;
    }
    public function ajax()
{
    header('Content-Type: application/json');
    echo json_encode(Gallery::all());
    exit;
}
}
