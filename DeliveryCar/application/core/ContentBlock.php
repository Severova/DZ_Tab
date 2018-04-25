<?php

namespace application\core;


class ContentBlock extends View
{
    protected function Initialize()
    {
        $this->aParams['items'] = [];
    }

    /**
     * @param View $oItem
     */

    public function addItem($oItem){
        $this->aParams['items'][] = $oItem;
    }

}