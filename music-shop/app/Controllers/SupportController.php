<?php
namespace App\Controllers;

use App\Models\Support;

class SupportController extends BaseController
{
    // сторінка чату
    public function index()
    {
        return $this->render('support/index');
    }

    // отримати повідомлення (JSON)
    public function ajax()
    {
        header('Content-Type: application/json');

        echo json_encode([
            'status' => 'success',
            'data' => Support::getMessages()
        ]);
        exit;
    }

    // відправити повідомлення (AJAX)
    public function ajaxSend()
    {
        header('Content-Type: application/json');

        if (empty($_POST['message'])) {
            echo json_encode(['status' => 'error']);
            exit;
        }

        Support::addMessage($_POST['message'], 0);

        echo json_encode(['status' => 'success']);
        exit;
    }

    // ================= ADMIN PANEL =================

public function admin()
{
    $this->checkAdmin();
    return $this->render('admin/support/index');
}

public function adminAjax()
{
    $this->checkAdmin();

    header('Content-Type: application/json');

    echo json_encode([
        'status' => 'success',
        'data' => \App\Models\Support::getMessages()
    ]);
    exit;
}

public function adminSend()
{
    $this->checkAdmin();

    header('Content-Type: application/json');

    if (empty($_POST['message'])) {
        echo json_encode(['status' => 'error']);
        exit;
    }

    \App\Models\Support::addMessage($_POST['message'], 1); // ADMIN = 1

    echo json_encode(['status' => 'success']);
    exit;
}

public function reply()
{
    $this->checkAdmin();

    if (!empty($_POST['message'])) {
        \App\Models\Support::addMessage($_POST['message'], 1);
    }

    header("Location: /?r=admin-support");
    exit;
}


}
