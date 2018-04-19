<?php

namespace application\core;


class Slider extends View
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