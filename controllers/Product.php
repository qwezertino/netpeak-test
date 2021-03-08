<?php


namespace Controllers;

use App\Controller;
use App\Database;

class Product extends Controller
{
    /**
     * @param $params
     * @throws \Doctrine\ORM\ORMException
     */
    public function add($params)
    {
        $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
        $image = 'data:image/png;base64,'.$image_base64;

        $product = new \Product();
        $product->setName($params['name']);
        $product->setUserName($params['user_name']);
        $product->setAvgPrice($params['avg_price']);
        $product->setImage($image);

        $db = (new Database())->db;

        $db->persist($product);
        $db->flush();

        header('Location: /');
        //return $this->index();
    }

    public function remove()
    {

    }
}