<?php

namespace App\Controllers;

use App\Models\Page;
use App\Core\Auth;

class PagesAdminController extends BaseController
{
    // захист адмінки
    protected function adminOnly()
    {
        if (!Auth::check()) {
            header("Location: /?r=login");
            exit;
        }
    }

    // список сторінок
    public function index()
    {
        $this->adminOnly();

        $pages = Page::all();
        return $this->render('admin/pages/index', compact('pages'));
    }

    // форма створення сторінки
    public function createForm()
    {
        $this->adminOnly();
        return $this->render('admin/pages/create');
    }

    // створити сторінку
    public function store()
    {
        $this->adminOnly();

        Page::create($_POST);
        header("Location: /?r=admin-pages");
        exit;
    }

    // форма редагування сторінки
    public function edit()
    {
        $this->adminOnly();

        $id = $_GET['id'] ?? null;
        $page = Page::find($id);
        return $this->render('admin/pages/edit', compact('page'));
    }

    // оновити сторінку
    public function update()
    {
        $this->adminOnly();

        Page::update($_POST['id'], $_POST);
        header("Location: /?r=admin-pages");
        exit;
    }

    // видалити сторінку
    public function delete()
    {
        $this->adminOnly();

        Page::delete($_GET['id']);
        header("Location: /?r=admin-pages");
        exit;
    }
}
