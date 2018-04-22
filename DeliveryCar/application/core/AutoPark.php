<?php

namespace application\core;

/**
 * Class AutoPark
 * @package application\core
 */
class AutoPark extends View
{
    protected function Initialize()
    {
        $this->aParams['items'] = [];
    }

    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
        return $this;
    }

}