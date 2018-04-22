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

    public function __call($methodName, $params)
    {
        $methodPrefix = substr($methodName, 0, 3);
        $name = (substr($methodName, 3));

        if ($methodPrefix == 'set')
        {
            $this->aParams['o'.$name] = $params[0];
            return $this;

        }
        elseif ($methodPrefix == 'get')
        {
            return $this->aParams['o'.$name];
        }
        return null;


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