<?php


namespace Controllers;


use App\Controller;
use App\Database;

class Review extends Controller
{
    public function new_review()
    {
        return $this->render('AddReview');
    }
    public function add($params)
    {
        $review = new \Review();
        $review->setUserName($params['user_name']);
        $review->setMessage($params['message']);
        $review->setRate($params['rate']);
        $review->setProductId($params['product_id']);

        $db = (new Database())->db;

        $db->persist($review);
        $db->flush();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}