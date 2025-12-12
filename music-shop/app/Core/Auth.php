<?php
namespace App\Core;

use App\Models\User;

class Auth
{
    public static function login($login, $password)
    {
        // ПРОСТА АВТОРИЗАЦІЯ БЕЗ БД (для курсової)
        if ($login === 'admin' && $password === 'admin') {
            $_SESSION['admin'] = true;
            return true;
        }

        return false;
    }

    // ✅ ОЦЬОГО МЕТОДУ НЕ ВИСТАЧАЛО
    public static function check()
    {
        return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
    }

    public static function logout()
    {
        unset($_SESSION['admin']);
    }
}
