<?php
namespace  application\controllers;

use application\core;
use application\model;

class Controller_Main extends core\Controller
{

    function action_index()
    {
        $oContentBlockSlider = new core\ContentBlock('slider');
        $this->oContent->setSlider($oContentBlockSlider);

        $oSlider = new core\Slider('slider');
        $oItem = new core\SliderItem('slider_item');

        $oModelAuto = new model\ModelAuto;
        $RezAuto = $oModelAuto->autoInfo();

        for($i = 0; $i < count($RezAuto); $i++) {
             foreach ($RezAuto[$i] as $nameValue => $valueValue) {
                 $oItem->$nameValue = $valueValue;
             }
             $oSlider->addItems($oItem);
             $oItem = new core\SliderItem('slider_item');
        }

        $this->oContent->getSlider()->addItem($oSlider);

        $oFastReservation = new core\FastReservation('fast_reservation');
        $oItemFastReservation = new core\FastReservationItem('fast_reservation_items');

        $oModelAutoFastReservation = new model\ModelAutoFastReservation;
        $RezAuto = $oModelAutoFastReservation->autoInfo();
        for($i = 0; $i < count($RezAuto); $i++) {
            foreach ($RezAuto[$i] as $nameValue => $valueValue) {
                $oItemFastReservation->$nameValue = $valueValue;
            }
            $oFastReservation->addItems($oItemFastReservation);
            $oItemFastReservation = new core\FastReservationItem('fast_reservation_items');
        }
        $this->oContent->getFastReservation()->addItem($oFastReservation);
        $this->oContent->render();

    }


}