<?php
namespace App\Controllers;

use App\Models\Product;
use App\Core\Auth;
use App\Models\News;

class AdminController extends BaseController
{
    public function loginForm()
    {
        return $this->render('admin/login');
    }

    public function login()
    {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        if (Auth::login($login, $password)) {
            header('Location: /?r=admin');
            exit;
        }

        echo "Wrong login or password";
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            header('Location: /?r=login');
            exit;
        }

        $products = Product::all();

        return $this->render('admin/dashboard', [
            'products' => $products
        ]);
    }

    public function create()
    {
        Product::create($_POST);
        header('Location: /?r=admin');
        exit;
    }

    public function createAjax()
    {
        Product::create($_POST);

        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            Product::delete($id);
        }

        header('Location: /?r=admin');
        exit;
    }

    public function edit()
    {
        $product = Product::find($_GET['id']);

        return $this->render('admin/edit', [
            'product' => $product
        ]);
    }

    public function update()
    {
        Product::update($_POST['id'], $_POST);
        header('Location: /?r=admin');
        exit;
    }

    public function logout()
    {
        Auth::logout();
        header('Location: /?r=login');
        exit;
    }

    /* ===================== NEWS ===================== */

/* ===================== NEWS ===================== */

public function newsList()
{
    $news = \App\Models\News::all();

    return $this->render('admin/news', [
        'news' => $news
    ]);
}

public function newsCreateForm()
{
    return $this->render('admin/news_create');
}

public function newsCreate()
{
    \App\Models\News::create($_POST);

    header("Location: /?r=admin-news");
    exit;
}

public function newsEdit()
{
    $id = $_GET['id'] ?? null;
    if (!$id) die('News ID required');

    $item = News::find($id);
    if (!$item) die('News not found');

    return $this->render('admin/news_edit', [
        'news' => $item   // ← ВАЖЛИВО!!!
    ]);
}

public function newsUpdate()
{
    $id = $_POST['id'] ?? null;

    if (!$id) {
        die("Missing ID");
    }

    \App\Models\News::update($id, $_POST);

    header("Location: /?r=admin-news");
    exit;
}

public function newsDelete()
{
    $id = $_GET['id'] ?? null;

    if (!$id) {
        die("Missing ID");
    }

    \App\Models\News::delete($id);

    header("Location: /?r=admin-news");
    exit;
}

}
