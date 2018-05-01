<?php

namespace application\core;

/**
 * Class FastReservation
 * @package application\core
 */
class Otzivi extends View
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