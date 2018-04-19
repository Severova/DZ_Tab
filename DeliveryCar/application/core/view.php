<?php

namespace application\core;

abstract class View
{

    protected $template = '';
    protected $aParams = [];

    public function __construct($template)
    {
        $this->template = $template;
        $this->Initialize();
    }

    public function __get($name)
    {
        $sFuncName = 'get'.ucfirst($name);
        if (method_exists($this,$sFuncName ))
            return $this->$sFuncName();

        return null;
    }

    public function __set($name,$value)
    {
        $sFuncName = 'set'.ucfirst($name);
        if (method_exists($this,$sFuncName ))
            $this->$sFuncName($value);

    }

    abstract protected function Initialize();

    public function render(){
        foreach ( $this->aParams as $paramName => $paramValue)
            $$paramName = $paramValue;

        include 'application\\views\\'.$this->template.'.php';
    }


}
