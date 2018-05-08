<?php

namespace application\core;

/**
 * Class Pages
 * @property string $brand
 * @property string $name
 * @property string $img
 * @property string $receiptAutoDate
 * @property string $returnDate
 * @property integer $price
 * @property string $nameClient
 * @property string $telephone
 * @property string $email
 * @property string $options
 */
class AboutOrd extends View
{
    protected function Initialize()
    {
        $this->aParams['brand'] = '';
        $this->aParams['name'] = '';
        $this->aParams['img'] = '';
        $this->aParams['receiptAutoDate'] = '';
        $this->aParams['returnDate'] = '';
        $this->aParams['price'] = '';
        $this->aParams['nameClient'] = '';
        $this->aParams['telephone'] = '';
        $this->aParams['email'] = '';
        $this->aParams['options'] = [];

    }
    public function setOptions($options)
    {
        $this->aParams['options'] = $options;
        return $this;
    }

    public function getOptions()
    {
        return $this->aParams['options'];
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

    /**
     * @return string
     */

    public function getEmail()
    {
        return $this->aParams['$email'];
    }

    /**
     * @param string $telephone
     * @return $this
     */
    public function setTelephone($telephone)
    {
        $this->aParams['telephone'] = $telephone;
        return $this;
    }

    /**
     * @return string
     */

    public function getTelephone()
    {
        return $this->aParams['$telephone'];
    }

    /**
     * @param string $nameClient
     * @return $this
     */
    public function setNameClient($nameClient)
    {
        $this->aParams['nameClient'] = $nameClient;
        return $this;
    }

    /**
     * @return string
     */

    public function getNameClient()
    {
        return $this->aParams['$nameClient'];
    }

    /**
     * @param string $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->aParams['price'] = $price;
        return $this;
    }

    /**
     * @return string
     */

    public function getPrice()
    {
        return $this->aParams['$price'];
    }

    /**
     * @param string $returnDate
     * @return $this
     */
    public function setReturnDate($returnDate)
    {
        $this->aParams['returnDate'] = $returnDate;
        return $this;
    }

    /**
     * @return string
     */

    public function getReturnDate()
    {
        return $this->aParams['$returnDate'];
    }

    /**
     * @param string $receiptAutoDate
     * @return $this
     */
    public function setReceiptAutoDate($receiptAutoDate)
    {
        $this->aParams['receiptAutoDate'] = $receiptAutoDate;
        return $this;
    }

    /**
     * @return string
     */

    public function getReceiptAutoDate()
    {
        return $this->aParams['$receiptAutoDate'];
    }

    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
        return $this;
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

    /**
     * @return string
     */

    public function getImg()
    {
        return $this->aParams['$img'];
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->aParams['name'] = $name;
        return $this;
    }

    /**
     * @return string
     */

    public function getName()
    {
        return $this->aParams['$name'];
    }

    /**
     * @param string $brand
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->aParams['brand'] = $brand;
        return $this;
    }

    /**
     * @return string
     */

    public function getBrand()
    {
        return $this->aParams['brand'];
    }

}