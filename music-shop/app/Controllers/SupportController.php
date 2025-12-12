<?php
namespace App\Controllers;

use App\Models\Support;

class SupportController extends BaseController
{
    public function index()
    {
        return $this->render('support/index', [
            'messages' => Support::getMessages()
        ]);
    }

    public function send()
    {
        if (!empty($_POST['message'])) {
            Support::addMessage($_POST['message'], 0); // user
        }

        header("Location: /?r=support");
        exit;
    }

    public function ajax()
    {
        header('Content-Type: application/json');
        echo json_encode(Support::getMessages());
        exit;
    }
    public function ajaxSend()
{
    header('Content-Type: application/json');

    if (!empty($_POST['message'])) {
        Support::addMessage($_POST['message'], 0); // user
    }

    echo json_encode([
        'success' => true,
        'messages' => Support::getMessages()
    ]);
    exit;
}

}
