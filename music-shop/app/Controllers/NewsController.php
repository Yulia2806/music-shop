<?php

namespace App\Controllers;

use App\Models\News;

class NewsController extends BaseController
{
    // ======================
    // 🟦 ПУБЛІЧНА ЧАСТИНА
    // ======================

    // Публічний список новин
    public function publicIndex()
    {
        $news = News::all();

        return $this->render('news', [
            'news' => $news
        ]);
    }

    // Публічний перегляд однієї новини
    public function show()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) die("ID required");

        $item = News::find($id);
        if (!$item) die("News not found");

        return $this->render('news_single', [
            'news' => $item
        ]);
    }

    // ======================
    // 🟥 АДМІНКА
    // ======================

    // Список новин в адмінці
    public function index()
    {
        $news = News::all();
        return $this->render('admin/news', [
            'news' => $news
        ]);
    }

    // Форма створення
    public function createForm()
    {
        return $this->render('admin/news_create');
    }

    // Створення новини
    public function create()
    {
        News::create($_POST);
        header("Location: /?r=admin-news");
        exit;
    }

    // Форма редагування
    public function edit()
    {
        if (!isset($_GET['id'])) die("ID not found");

        $news = News::find($_GET['id']);

        return $this->render('admin/news_edit', [
            'news' => $news
        ]);
    }

    // Оновлення новини
    public function update()
    {
        News::update($_POST['id'], $_POST);
        header("Location: /?r=admin-news");
        exit;
    }

    // Видалення новини
    public function delete()
    {
        if (isset($_GET['id'])) {
            News::delete($_GET['id']);
        }

        header("Location: /?r=admin-news");
        exit;
    }
   
    public function ajax()
{
    header('Content-Type: application/json');
    echo json_encode(News::all());
    exit;
}
}
