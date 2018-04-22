<?php
namespace  application\controllers;

use application\core;
use application\model;

class Controller_Main extends core\Controller
{


    function action_index()
    {
        $oContentBlockFastReservation = new core\ContentBlock('fast_reservation');
        $this->oContent->Content->setFastReservation($oContentBlockFastReservation);

        $oSlider = new core\Slider('slider');
        $oItem = new core\SliderItem('slider_item');

        $oFastReservation = new core\FastReservation('fast_reservation');
        $oItemFastReservation = new core\AutoItemMini('fast_reservation_items');

        $oDiscounts = new model\Discount;//TODO осуществить норм подключение к бд

        $oAutos = model\Auto::findAllObj();

        foreach ($oAutos->attributes as $value) {

            foreach ($value as $key => $autoValue){

                $oAuto = model\Auto::findById($value['id']);

                $oFastReservation->brand = $oAuto->getBrand();
                $oItemFastReservation->name = $oAuto->getNameModel();
                $oItemFastReservation->brand = $oAuto->getBrand();
                $oItemFastReservation->percent = $oAuto->getPercent();
                $oItemFastReservation->price = $oAuto->getPrice();
                $oItemFastReservation->transmission = $oAuto->getTransmission();
                $oItemFastReservation->drivingExperience = $oAuto->getDrivingExperience();
                $oItemFastReservation->img = $oAuto->getImg();

            }

            if (!is_null($oItemFastReservation->percent)){

                $oItem->setAParams($oItemFastReservation->getAParams());
                $oSlider->addItems($oItem);
            }

            $oFastReservation->addItems($oItemFastReservation);


            $oItem = new core\SliderItem('slider_item');
            $oItemFastReservation = new core\AutoItemMini('fast_reservation_items');
        }


        $this->oContent->getSlider()->addItem($oSlider);
        $this->oContent->Content->addItem($oFastReservation);

        $this->oContent->render();
    }
}