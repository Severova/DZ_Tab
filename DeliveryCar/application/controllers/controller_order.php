<?php
namespace  application\controllers;

use application\core;
use application\model;

class Controller_Order extends core\Controller
{

    function action_add($modelName)
    {
        $oItemsOrder = new core\Order('order_view');

        $oModels = new model\ModelAuto; //TODO нормальное подключение к бд!

        $idModel = model\ModelAuto::findLineByCategory('nameModel', $modelName)->getId();
        $oAuto = model\Auto::findLineByCategory('idModel', $idModel);

        $oItemsOrder->name = $oAuto->getNameModel();
        $oItemsOrder->brand = $oAuto->getBrand();
        $oItemsOrder->percent = $oAuto->getPercent();
        $oItemsOrder->price = $oAuto->getPrice();
        $oItemsOrder->img = $oAuto->getImg();

        $this->oContent->Content->addItem($oItemsOrder);


        $this->oContent->render();
    }

}