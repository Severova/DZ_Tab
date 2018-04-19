<?php

namespace application\core;

/**
 * Class MenuItem
 * @package application\core
 * @property string $href
 */
class SliderItem extends Slider
{
    protected function Initialize()
    {
        parent::Initialize();
        $this->aParams['name'] = '';
        $this->aParams['brend'] = '';
        $this->aParams['percent'] = '';
        $this->aParams['price'] = '';
        $this->aParams['img'] = '';
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