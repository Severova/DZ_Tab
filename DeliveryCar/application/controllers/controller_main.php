<?php
namespace  application\controllers;

use application\core;
use application\models;

class Controller_Main extends core\Controller
{


    function action_index()
    {

        $oContentBlockFastReservation = new core\ContentBlock('fast_reservation');
        $this->oContent->Content->setFastReservation($oContentBlockFastReservation);

        $oSlider = new core\Slider('slider');

        $oFastReservation = new core\FastReservation('fast_reservation');


        $oBrand = models\BrandAuto::findAllObj();

        foreach ($oBrand as $value) {
            foreach ($value as $vValue) {
                $oFastReservation->setBrand($vValue['nameBrand']);
            }
        }


        $oAutos = models\Auto::findAllObj();

        foreach ($oAutos->attributes as $value) {

            $oAuto = models\Auto::findById($value['id']);

            $oItemFastReservation = new core\AutoItemMini('fast_reservation_items');

            $oItemFastReservation->name = $oAuto->getNameModel();
            $oItemFastReservation->brand = $oAuto->getBrand();
            $oItemFastReservation->percent = $oAuto->getPercent();
            $oItemFastReservation->price = $oAuto->getPrice();
            $oItemFastReservation->transmission = $oAuto->getTransmission();
            $oItemFastReservation->drivingExperience = $oAuto->getDrivingExperience();
            $oItemFastReservation->img = $oAuto->getImg();

            $oItem = new core\SliderItem('slider_item');

            if (!is_null($oItemFastReservation->percent)){

                $oItem->setAParams($oItemFastReservation->getAParams());
                $oSlider->addItems($oItem);
            }

            $oFastReservation->addItems($oItemFastReservation);

        }

        $this->oContent->getSlider()->addItem($oSlider);
        $this->oContent->Content->addItem($oFastReservation);

        $this->oContent->render();
    }
}