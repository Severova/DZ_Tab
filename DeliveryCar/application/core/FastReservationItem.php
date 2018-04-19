<?php

namespace application\core;

/**
 * Class MenuItem
 * @package application\core
 * @property string $href
 */
class FastReservationItem extends Slider
{
    protected function Initialize()
    {
        parent::Initialize();
        $this->aParams['name'] = '';
        $this->aParams['brend'] = '';
        $this->aParams['percent'] = '';
        $this->aParams['price'] = '';
        $this->aParams['transmission'] = '';
        $this->aParams['drivingExperience'] = '';
        $this->aParams['img'] = '';
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

    public function getBrend()
    {
        return $this->aParams['brend'];
    }

    /**
     * @param string $brend
     * @return $this
     */
    public function setBrend($brend)
    {
        $this->aParams['brend'] = $brend;
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