<?php

namespace application\core;

/**
 * Class Menu
 * @package application\core
 * @property string $title
 */
class Menu extends View
{
    protected function Initialize()
    {
        $this->aParams['items'] = [];
        $this->aParams['title'] = '';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->aParams['title'];
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->aParams['title'] = $title;
        return $this;
    }

    /**
     * @param $oItem
     * @return $this
     */
    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
        return $this;
    }
}