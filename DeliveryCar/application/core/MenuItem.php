<?php

namespace application\core;

/**
 * Class MenuItem
 * @package application\core
 * @property string $href
 */
class MenuItem extends Menu
{
    protected function Initialize()
    {
        parent::Initialize();
        $this->aParams['href'] = '';
    }


    /**
     * @return string
     */
    public function getHref()
    {
        return $this->aParams['href'];
    }

    /**
     * @param string $href
     * @return $this
     */
    public function setHref($href)
    {
        $this->aParams['href'] = $href;
        return $this;
    }


}