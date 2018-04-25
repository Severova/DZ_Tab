<?php

namespace application\core;

/**
 * Class AutoInfo
 * @package application\core
 * @property string $name
 * @property string $brand
 * @property string $percent
 * @property string $price
 * @property string $img
 * @property string $options
 */
class Order extends View
{
    protected function Initialize()
    {
        $this->aParams['name'] = '';
        $this->aParams['brand'] = '';
        $this->aParams['percent'] = '';
        $this->aParams['price'] = '';
        $this->aParams['options'] = [];
        $this->aParams['optionsPrice'] = '';
        $this->aParams['img'] = '';
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
     * @param string $optionsPrice
     * @return $this
     */
    public function setOptionsPrice($optionsPrice)
    {
        $this->aParams['optionsPrice'] = $optionsPrice;
        return $this;
    }

    public function getOptionsPrice()
    {
        return $this->aParams['optionsPrice'];
    }


    public function getPercent()
    {
        return $this->aParams['percent'];
    }

    /**
     * @param string $percent
     * @return $this
     */
    public function setPercent($percent)
    {
        $this->aParams['percent'] = $percent;
        return $this;
    }

    public function getName()
    {
        return $this->aParams['name'];
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

    public function getBrand()
    {
        return $this->aParams['brand'];
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

    public function getPrice()
    {
        return $this->aParams['price'];
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

    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
        return $this;
    }
}