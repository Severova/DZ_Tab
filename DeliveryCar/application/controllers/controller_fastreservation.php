<?php

namespace application\controllers;

use application\core;
use application\model;

class Controller_Fastreservation extends core\Controller{
    public function __construct(){
    }

    function action_index()
    {
        $idBrand = (isset($_POST['idBrand'])) ? (int)$_POST['idBrand'] : 0;

        if($idBrand==0){
            $oModel = (model\ModelAuto::findAllObj())->attributes;

        } elseif($idBrand!=0) {
            $oModel = model\ModelAuto::getListObjectByCategory('id','idBrand', $idBrand);
        }

        $out = new core\ContentBlock('ajax_fast');


        if(is_null($oModel)){
            echo "К сожалению, на данный момент машин такой модели нет в наличии";

            return true;
        }

        foreach ($oModel as $value){

            $oItemFastReservations = new core\AutoItemMini('fast_reservation_items');

            if($idBrand==0){
                $oAuto = model\Auto::findById($value['id']);
            } else {
                $oAuto = model\Auto::findLineByCategory('idModel',$value->getId());
            }

            $oItemFastReservations->name = $oAuto->getNameModel();
            $oItemFastReservations->brand = $oAuto->getBrand();
            $oItemFastReservations->percent = $oAuto->getPercent();
            $oItemFastReservations->price = $oAuto->getPrice();
            $oItemFastReservations->transmission = $oAuto->getTransmission();
            $oItemFastReservations->drivingExperience = $oAuto->getDrivingExperience();
            $oItemFastReservations->img = $oAuto->getImg();

            $out->addItem($oItemFastReservations);

        }

        $out->render();

    }
}