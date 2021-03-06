<?php
namespace  application\controllers;

use application\core;
use application\models;

class Controller_Autopark extends core\Controller
{

    function action_index()
    {
        $oContentBlockAutoPark = new core\ContentBlock('auto_park');
        $this->oContent->Content->setAutoPark($oContentBlockAutoPark);

        $oAutoPark = new core\AutoPark('auto_park');
        $oAutoParkModel = new core\AutoParkModel('auto_park_model');

        $oAutos = models\Auto::findAllObj();

        foreach ($oAutos->attributes as $value) {

            $oAuto = models\Auto::findById($value['id']);

            $oAutoParkModel->brandAuto = $oAuto->getBrand();
            $oAutoParkItem = new core\AutoItemMini('auto_park_items');

            $oAutoParkItem->name = $oAuto->getNameModel();
            $oAutoParkItem->brand = $oAuto->getBrand();
            $oAutoParkItem->percent = $oAuto->getPercent();
            $oAutoParkItem->price = $oAuto->getPrice();
            $oAutoParkItem->transmission = $oAuto->getTransmission();
            $oAutoParkItem->drivingExperience = $oAuto->getDrivingExperience();
            $oAutoParkItem->img = $oAuto->getImg();

            $oAutoParkModel->addItems($oAutoParkItem);

        }

        $oAutoPark->addItems($oAutoParkModel);
        $this->oContent->Content->addItem($oAutoPark);

        $this->oContent->render();

    }

    function action_info($modelName){

        $oAutoInfoItems = new core\AutoInfo('info_auto');

        $idModel = models\ModelAuto::findLineByCategory('nameModel', $modelName)->getId();
        $oAuto = models\Auto::findLineByCategory('idModel', $idModel);

        $oAutoInfoItems->name = $oAuto->getNameModel();
        $oAutoInfoItems->brand = $oAuto->getBrand();
        $oAutoInfoItems->percent = $oAuto->getPercent();
        $oAutoInfoItems->price = $oAuto->getPrice();
        $oAutoInfoItems->transmission = $oAuto->getTransmission();
        $oAutoInfoItems->drivingExperience = $oAuto->getDrivingExperience();
        $oAutoInfoItems->img = $oAuto->getImgOther();
        $oAutoInfoItems->diviz = $oAuto->getDiviz();
        $oAutoInfoItems->description = $oAuto->getDescription();

        $this->oContent->Content->addItem($oAutoInfoItems);

        $this->oContent->render();

    }
}