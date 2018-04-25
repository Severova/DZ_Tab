<?php

namespace application\core;

/**
 * Class AutoParkModel
 * @package application\core
 * @property string $brandAuto
 * @property string $imdBrand
 */
class AutoParkModel extends AutoPark
{
    protected function Initialize()
    {
        parent::Initialize();

        $this->aParams['brandAuto'] = '';
        $this->aParams['imgBrand'] = '';
        $this->aParams['items'] = [];
    }

    public function getBrandAuto()
    {
        return $this->aParams['brandAuto'];
    }

    /**
     * @param string $brandAuto
     * @return $this
     */

    public function setBrandAuto($brandAuto)
    {
        $this->aParams['brandAuto'] = $brandAuto;
        return $this;
    }

    public function getImgBrand()
    {
        return $this->aParams['imgBrand'];
    }

    /**
     * @param string $imgBrand
     * @return $this
     */

    public function setImgBrand($imgBrand)
    {
        $this->aParams['imgBrand'] = $imgBrand;
        return $this;
    }

}