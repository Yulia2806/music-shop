<?php

namespace App\Controllers;

use App\Models\Product;

class CatalogController extends BaseController
{
    public function index()
    {
        $products = Product::all();
        
        return $this->render('catalog', [
            'products' => $products,
            'title' => 'Catalog'
        ]);
    }

    public function ajax()
    {
        header('Content-Type: application/json');
        echo json_encode(Product::all());
        exit;
    }

    public function ajaxAdd()
{
    header('Content-Type: application/json');

    if (
        empty($_POST['name']) ||
        empty($_POST['price'])
    ) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Missing required fields'
        ]);
        exit;
    }

    \App\Models\Product::create([
        'name'        => $_POST['name'],
        'price'       => $_POST['price'],
        'description' => $_POST['description'] ?? ''
    ]);

    echo json_encode([
        'status' => 'success',
        'message' => 'Product added'
    ]);
    exit;
}

}
