<?php

namespace App\Controllers;

use App\Core\Auth;

class BaseController
{
    public function render($view, $data = [])
    {
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            die("View not found: $viewFile");
        }

        extract($data); // створює змінні для view

        // Загальний шаблон
        include __DIR__ . '/../Views/layouts/header.php';
        include $viewFile;
        include __DIR__ . '/../Views/layouts/footer.php';
    }

    protected function checkAdmin()
    {
        if (!Auth::check()) {
            header("Location: /?r=login");
            exit;
        }
    }
}
