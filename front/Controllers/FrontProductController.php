<?php
namespace Controllers;

use models\FrontProduct;

require_once __DIR__ . '/../Models/FrontProduct.php';

class FrontProductController
{
    public function index()
    {
        $productAll = new FrontProduct();
        $products = $productAll->getProducts();
        require_once __DIR__ . '/../views/front/products/products.php';
    }
}