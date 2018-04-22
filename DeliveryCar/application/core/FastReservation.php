<?php

namespace application\core;

/**
 * Class FastReservation
 * @package application\core
 * @property string $brand
 * @property string $imdBrand
 */
class FastReservation extends View
{
    protected function Initialize()
    {
        $this->aParams['brand'] = '';
        $this->aParams['items'] = [];
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

    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
        return $this;
    }
}