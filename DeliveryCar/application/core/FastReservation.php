<?php

namespace application\core;


class FastReservation extends View
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