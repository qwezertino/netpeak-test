<?php


namespace Controllers;

use App\Controller;
use App\Database;

class Product extends Controller
{
    public function new_product()
    {
        return $this->render('AddProduct');
    }
    /**
     * @param $params
     * @throws \Doctrine\ORM\ORMException
     */
    public function add($params)
    {

        $image_base64 = base64_encode(file_get_contents(
            empty($params['image_url']) ? $_FILES['image']['tmp_name'] : $params['image_url'])
        );
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
    }

    /**
     * @param $id
     * @return false|string
     */
    public function info($id)
    {
        $db = (new Database())->db;
        $product = $db->find('Product', $id);

        $reviewRepository = $db->getRepository('Review');

        $reviews = $reviewRepository->findBy(['product_id' => $id]);

        $reviewAvg = round($reviewRepository->createQueryBuilder('r')
            ->select('avg(r.rate)')
            ->where('r.product_id = :product_id')
            ->setParameter('product_id', $id)
            ->getQuery()
            ->getSingleScalarResult());

        return $this->render('ProductInfo', ['product' => $product, 'reviews' => $reviews, 'review_avg' => $reviewAvg]);

    }
    public function remove()
    {

    }
}