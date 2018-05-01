<?php

namespace application\core;

/**
 * Class Pages
 * @property string $text
 */
class Pages extends View
{
    protected function Initialize()
    {
        $this->aParams['text'] = '';
    }

    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->aParams['text'] = $text;
        return $this;
    }

    /**
     * @return string
     */

    public function getText()
    {
        return $this->aParams['text'];
    }

}