<?php

namespace application\core;

/**
 * Class AutoInfo
 * @package application\core
 * @property string $name
 * @property string $brand
 * @property string $percent
 * @property string $price
 * @property string $transmission
 * @property string $drivingExperience
 * @property string $description
 * @property string $diviz
 * @property array $img
 */
class AutoInfo extends View
{
    protected function Initialize()
    {
        $this->aParams['name'] = '';
        $this->aParams['brand'] = '';
        $this->aParams['percent'] = '';
        $this->aParams['price'] = '';
        $this->aParams['transmission'] = '';
        $this->aParams['drivingExperience'] = '';
        $this->aParams['description'] = '';
        $this->aParams['diviz'] = '';
        $this->aParams['img'] = [];
    }

    /**
     * @param string $diviz
     * @return $this
     */
    public function setDiviz($diviz)
    {
        $this->aParams['diviz'] = $diviz;
        return $this;
    }

    /**
     * @return string
     */

    public function getDiviz()
    {
        return $this->aParams['diviz'];
    }

    /**
     * @param string $description
     * @return $this
     */

    public function setDescription($description)
    {
        $this->aParams['description'] = $description;
        return $this;
    }

    /**
     * @return string
     */

    public function getDescription()
    {
        return $this->aParams['description'];
    }

    /**
     * @param array $Params
     * @return $this
     */

    public function setAParams($Params = [])
    {
        $this->aParams = $Params;
        return $this;
    }

    /**
     * @return array
     */

    public function getAParams()
    {
        return $this->aParams;
    }

    /**
     * @return int
     */

    public function getDrivingExperience()
    {
        return $this->aParams['drivingExperience'];
    }

    /**
     * @param int $drivingExperience
     * @return $this
     */

    public function setDrivingExperience($drivingExperience)
    {
        $this->aParams['drivingExperience'] = $drivingExperience;
        return $this;
    }

    /**
     * @return string
     */

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

    /**
     * @return int
     */

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

    /**
     * @return string
     */

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

    /**
     * @return string
     */

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

    /**
     * @return int
     */

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

    /**
     * @return string
     */

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