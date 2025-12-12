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
}
