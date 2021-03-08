<?php


namespace Controllers;

use App\Controller;
use App\Database;

class Home extends Controller
{

    public function index()
    {
        $productRepository = (new Database())->db->getRepository('Product');
        $products = $productRepository->findAll();

        return $this->render('Home', ['products' => $products]);
    }

    public function add_product()
    {
        return $this->render('AddProduct');
    }
}