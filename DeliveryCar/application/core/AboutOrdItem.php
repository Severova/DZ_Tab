<?php

namespace application\core;

/**
 * Class Pages
 * @property string $brand
 * @property string $name
 * @property string $receiptAutoDate
 * @property string $returnDate
 * @property integer $price

 */
class AboutOrdItem extends AboutOrd
{
    protected function Initialize()
    {
        parent::Initialize();
        $this->aParams['brand'] = '';
        $this->aParams['name'] = '';
        $this->aParams['receiptAutoDate'] = '';
        $this->aParams['returnDate'] = '';
        $this->aParams['price'] = '';

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