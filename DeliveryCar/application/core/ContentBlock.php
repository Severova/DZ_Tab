<?php

namespace application\core;


class ContentBlock extends View
{
    protected function Initialize()
    {
        $this->aParams['items'] = [];
    }

    /**
     * @param BestView $oItem
     */
    public function addItem($oItem){
        $this->aParams['items'][] = $oItem;
    }

}