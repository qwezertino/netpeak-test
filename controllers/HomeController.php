<?php


namespace Controllers;

use App\Controller;
use App\Database;

class Home extends Controller
{

    public function index()
    {
        $db = (new Database())->db;
        /*$products = $db->getRepository('Product')->findAll();*/
        //$productRepository = $db->getRepository('Product');
        $products = $db->createQueryBuilder()
            ->select('p', 'count(r.id) as review_count')
            ->from(\Product::class, 'p')
            ->leftJoin(\Review::class,'r', 'WITH', 'p.id = r.product_id')
            ->groupBy('p.id')
            ->getQuery()
            ->getResult();

        return $this->render('Home', ['products' => $products]);
    }
}