<?php
namespace App\Controllers;

use App\Models\Page;

class PagesController extends BaseController
{
    public function index()
    {
        $pages = Page::all();
        return $this->render('pages/index', ['pages' => $pages]);
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Page ID is missing.";
            return;
        }

        $page = Page::find($id);

        if (!$page) {
            echo "Page not found.";
            return;
        }

        return $this->render('pages/show', ['page' => $page]);
    }
}

