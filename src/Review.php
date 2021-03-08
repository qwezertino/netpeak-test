<?php

/**
 * Class Review
 * @Entity @Table(name="reviews")
 */
class Review
{
    /**
     * @id @Column(type="integer") @GeneratedValue
     */
    protected $id;
    /**
     * @Column user_name(type="string")
     */
    protected $user_name;
    /**
     * @Column rate(type="integer")
     */
    protected $rate;
    /**
     * @Column message(type="string")
     */
    protected $message;
    /**
     * @Column creation_date(type="datetime")
     */
    protected $creation_date;

    public function __construct()
    {
        $this->creation_date = new DateTime();
    }

    public function getUserName()
    {
        return $this->user_name;
    }
    public function getRate()
    {
        return $this->rate;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getDate()
    {
        return $this->creation_date;
    }

    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }
    public function setRate($rate)
    {
        $this->rate = $rate;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }
}