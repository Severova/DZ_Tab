<?php

namespace application\core;

/**
 * Class OtziviItem
 * @package application\core
 * @property string $userName
 * @property string $titleReviews
 * @property string $text
 * @property string $date
 * @property string $email
 * @property string $img
 */
class OtziviItem extends Otzivi
{
    protected function Initialize()
    {
        parent::Initialize();
        $this->aParams['userName'] = '';
        $this->aParams['titleReviews'] = '';
        $this->aParams['text'] = '';
        $this->aParams['date'] = '';
        $this->aParams['email'] = '';
        $this->aParams['img'] = '';
    }

    public function setAParams($Params = [])
    {
        $this->aParams = $Params;
        return $this;
    }

    public function getAParams()
    {
        return $this->aParams;
    }

    public function getEmail()
    {
        return $this->aParams['email'];
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->aParams['email'] = $email;
        return $this;
    }

    public function getText()
    {
        return $this->aParams['text'];
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->aParams['text'] = $text;
        return $this;
    }

    public function getUserName()
    {
        return $this->aParams['userName'];
    }

    /**
     * @param string $userName
     * @return $this
     */
    public function setUserName($userName)
    {
        $this->aParams['userName'] = $userName;
        return $this;
    }

    public function getTitleReviews()
    {
        return $this->aParams['titleReviews'];
    }

    /**
     * @param string $titleReviews
     * @return $this
     */
    public function setTitleReviews($titleReviews)
    {
        $this->aParams['titleReviews'] = $titleReviews;
        return $this;
    }

    public function getDate()
    {
        return $this->aParams['date'];
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->aParams['date'] = $date;
        return $this;
    }

    public function getImg()
    {
        return $this->aParams['img'];
    }

    /**
     * @param string $img
     * @return $this
     */
    public function setImg($img)
    {
        $this->aParams['img'] = $img;
        return $this;
    }
}