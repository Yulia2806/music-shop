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
            http_response_code(404);
            return;
        }
    
        $page = Page::find($id);
    
        if (!$page) {
            http_response_code(404);
            return;
        }

        return $this->render('pages/show', ['page' => $page]);
    }

    public function listJson()
{
    header('Content-Type: application/json; charset=utf-8');

    $pages = Page::all();

    echo json_encode([
        'status' => 'ok',
        'data' => $pages
    ]);
    exit;
}

public function ajaxList()
{
    header('Content-Type: application/json');

    $pages = Page::all();

    echo json_encode([
        'status' => 'success',
        'data' => $pages
    ]);
    exit;
}


}

