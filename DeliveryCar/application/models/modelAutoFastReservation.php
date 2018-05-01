<?php

namespace application\models;
use application\core\Model;


class ModelAutoFastReservation extends Model{


    public function autoInfo() {

        $aModel = ModelAuto::findAll();
        for($i=0; $i<count($aModel); $i++) {
            $aRezAuto[$i]['percent'] = Discount::getListByCategory('percent', 'idModel', $aModel[$i]['id']);
            $aRezAuto[$i]['name'] = $aModel[$i]['nameModel'];
            $aRezAuto[$i]['brend'] = BrandAuto::findById($aModel[$i]['idBrend'])->getnameBrend();
            $aRezAuto[$i]['price'] = $aModel[$i]['price'];
            $aRezAuto[$i]['img'] = (ImageAuto::findById(Auto::findById($aModel[$i][id])->getId())->getImgAuto());
            $aRezAuto[$i]['transmission'] = Transmission::findById($aModel[$i]['idTransmission'])->getType();
            $aRezAuto[$i]['drivingExperience'] = $aModel[$i]['drivingExperience'];
        }
        return $aRezAuto;

    }


}




