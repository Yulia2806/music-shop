<?php
session_start();

/* ===== MANUAL AUTOLOAD ===== */

require __DIR__ . '/music-shop/config/config.php';
require __DIR__ . '/music-shop/app/Core/Auth.php';
require __DIR__ . '/music-shop/app/Core/Cache.php';

require __DIR__ . '/music-shop/app/Models/Model.php';
require __DIR__ . '/music-shop/app/Models/Product.php';
require __DIR__ . '/music-shop/app/Models/News.php';
require __DIR__ . '/music-shop/app/Models/Gallery.php';
require __DIR__ . '/music-shop/app/Models/Page.php';
require __DIR__ . '/music-shop/app/Models/Support.php';


require __DIR__ . '/music-shop/app/Controllers/BaseController.php';
require __DIR__ . '/music-shop/app/Controllers/CatalogController.php';
require __DIR__ . '/music-shop/app/Controllers/NewsController.php';
require __DIR__ . '/music-shop/app/Controllers/PagesController.php';
require __DIR__ . '/music-shop/app/Controllers/GalleryController.php';
require __DIR__ . '/music-shop/app/Controllers/AdminController.php';
require __DIR__ . '/music-shop/app/Controllers/PagesAdminController.php';
require __DIR__ . '/music-shop/app/Controllers/SupportController.php';

use App\Models\Model;
use App\Models\Page;
use App\Controllers\CatalogController;
use App\Controllers\NewsController;
use App\Controllers\PagesController;
use App\Controllers\GalleryController;
use App\Controllers\AdminController;
use App\Controllers\PagesAdminController;
use App\Controllers\SupportController;

/* ===== INIT DB ===== */
$config = require __DIR__ . '/music-shop/config/config.php';
Model::init($config['db']);

/* ===== ROUTING ===== */

$route = $_GET['r'] ?? '/';

switch ($route) {

    /* ======================
       PUBLIC (SITE)
    ====================== */

    case '/':
        (new CatalogController())->index();
        break;

        case 'news':
            (new NewsController())->publicIndex();
            break;
        
        case 'news-view':
            (new NewsController())->show();
            break;

    case 'pages':
        (new PagesController())->index();
        break;

    case 'gallery':
        (new GalleryController())->index();
        break;

    /* ======================
       AUTH
    ====================== */

    case 'login':
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new AdminController())->login()
            : (new AdminController())->loginForm();
        break;

    case 'logout':
        (new AdminController())->logout();
        break;

    /* ======================
       ADMIN DASHBOARD
    ====================== */

    case 'admin':
        (new AdminController())->dashboard();
        break;

    /* ======================
       ADMIN PRODUCTS
    ====================== */

    case 'admin-products':
        (new AdminController())->dashboard(); // список товарів у dashboard
        break;

    case 'admin-product-create':
        (new AdminController())->create();
        break;

    case 'admin-product-edit':
        (new AdminController())->edit();
        break;

    case 'admin-product-update':
        (new AdminController())->update();
        break;

    case 'admin-product-delete':
        (new AdminController())->delete();
        break;

    case 'admin-product-create-ajax':
        (new AdminController())->createAjax();
        break;

    /* ======================
       ADMIN NEWS
    ====================== */

        
        case 'admin-news':
            (new NewsController())->index();
            break;   

    case 'admin-news-create':
        (new AdminController())->newsCreateForm();
        break;

    case 'admin-news-store':
        (new AdminController())->newsCreate();
        break;

    case 'admin-news-edit':
        (new AdminController())->newsEdit();
        break;

    case 'admin-news-update':
        (new AdminController())->newsUpdate();
        break;

    case 'admin-news-delete':
        (new AdminController())->newsDelete();
        break;

        case 'admin-gallery':
            (new GalleryController())->adminIndex();
            break;
        
        case 'admin-gallery-upload':
            (new GalleryController())->upload();
            break;

        case 'admin-gallery-edit':
                (new GalleryController())->adminEdit();
                break;
            
            case 'admin-gallery-update':
                (new GalleryController())->update();
                break;
                
        
        case 'admin-gallery-delete':
            (new GalleryController())->delete();
            break;

        case 'admin-pages':
            (new PagesAdminController())->index();
            break;
            
        case 'admin-pages-create':
            (new PagesAdminController())->createForm();
            break;
            
        case 'admin-pages-store':
            (new PagesAdminController())->store();
            break;
            
        case 'admin-pages-edit':
            (new PagesAdminController())->edit();
            break;
            
        case 'admin-pages-update':
            (new PagesAdminController())->update();
            break;
            
        case 'admin-pages-delete':
            (new PagesAdminController())->delete();
            break;

            case 'pages':
                (new PagesController())->index();
                break;
            
            case 'page':
                (new PagesController())->show();
                break;
            
       case 'pages-list':
            (new PagesController())->index();
            break;
            case 'support':
                (new App\Controllers\SupportController())->index();
                break;
            
            case 'support-send':
                (new App\Controllers\SupportController())->send();
                break;
            
            case 'admin/support':
                (new App\Controllers\SupportController())->admin();
                break;
            
            case 'admin/support-reply':
                (new App\Controllers\SupportController())->reply();
                break;
                case 'support-ajax':
                    (new App\Controllers\SupportController())->ajax();
                    break;        
                    case 'support-send-ajax':
                        (new SupportController)->ajaxSend();
                        break;
                    
         
                
                
                    
    /* ======================
       404
    ====================== */

    default:
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        break;
}
