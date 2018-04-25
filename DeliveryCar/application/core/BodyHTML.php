<?php

namespace application\core;

/**
 * Class BodyHTML
 * @package application\core
 * @property ContentBlock $Content;
 * @property ContentBlock $Menu;
 * @property ContentBlock $Slider;
 */
class BodyHTML extends View
{
    protected function Initialize()
    {
        $this->aParams['oMenu'] = new ContentBlock('menu');
        $this->aParams['oSlider'] = new ContentBlock('slider');
        $this->aParams['oContent'] = new ContentBlock('content');

    }

    public function getMenu(){
        return $this->aParams['oMenu'];
    }

    public function getSlider(){
        return $this->aParams['oSlider'];
    }

    public function getContent(){
        return $this->aParams['oContent'];
    }

}