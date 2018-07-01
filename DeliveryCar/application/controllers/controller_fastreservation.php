<?php

namespace application\controllers;

use application\core;
use application\models;
use DateTime;

class Controller_Fastreservation extends core\Controller{
    public function __construct(){
    }

    function action_index()
    {
        $idBrand = (isset($_POST['idBrand'])) ? (int)$_POST['idBrand'] : 0;

        $endingDate = (isset($_POST['ending_date'])) ? $_POST['ending_date'] : 0;
        $startDate = (isset($_POST['start_date'])) ? $_POST['start_date'] : 0;

        if($idBrand==0){
            $oModel = (models\ModelAuto::findAllObj())->attributes;

        } elseif($idBrand!=0) {
            $oModel = models\ModelAuto::getListObjectByCategory('id','idBrand', $idBrand);
        }

        $out = new core\ContentBlock('ajax_fast');


        if(is_null($oModel)){
            echo "<div class=\"mes-no-car\"><p>К сожалению, на данный момент машин такой модели нет в наличии</p></div>";

            return true;
        }

        foreach ($oModel as $value){

            $oItemFastReservations = new core\AutoItemMini('fast_reservation_items');

            if($idBrand==0){
                $oAuto = models\Auto::findById($value['id']);
            } else {
                $oAuto = models\Auto::findLineByCategory('idModel',$value->getId());
            }

            if($endingDate!=0) {
                $str_to_date = DateTime::createFromFormat('m-d-Y', $endingDate)->format('Y-m-d');
                $oAuto->StatusAdd($startDate, $str_to_date);
            }


            $oItemFastReservations->name = $oAuto->getNameModel();
            $oItemFastReservations->brand = $oAuto->getBrand();
            $oItemFastReservations->percent = $oAuto->getPercent();
            $oItemFastReservations->price = $oAuto->getPrice();
            $oItemFastReservations->transmission = $oAuto->getTransmission();
            $oItemFastReservations->drivingExperience = $oAuto->getDrivingExperience();
            $oItemFastReservations->img = $oAuto->getImg();
            $oItemFastReservations->status = $oAuto->getStatus();

            $out->addItem($oItemFastReservations);

        }

        $out->render();

    }
}