<?php

namespace application\core;

/**
 * Class MenuItem
 * @package application\core
 * @property string $name
 * @property string $brand
 * @property string $percent
 * @property string $price
 * @property string $transmission
 * @property string $drivingExperience
 * @property string $img
 */
class SliderItem extends Slider
{
    protected function Initialize()
    {
        parent::Initialize();
        $this->aParams['name'] = '';
        $this->aParams['brand'] = '';
        $this->aParams['percent'] = '';
        $this->aParams['price'] = '';
        $this->aParams['transmission'] = '';
        $this->aParams['drivingExperience'] = '';
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

    public function getDrivingExperience()
    {
        return $this->aParams['drivingExperience'];
    }

    /**
     * @param string $drivingExperience
     * @return $this
     */
    public function setDrivingExperience($drivingExperience)
    {
        $this->aParams['drivingExperience'] = $drivingExperience;
        return $this;
    }

    public function getTransmission()
    {
        return $this->aParams['transmission'];
    }

    /**
     * @param string $transmission
     * @return $this
     */
    public function setTransmission($transmission)
    {
        $this->aParams['transmission'] = $transmission;
        return $this;
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
}