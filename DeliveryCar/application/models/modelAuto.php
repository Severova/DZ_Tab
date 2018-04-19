<?php

namespace application\model;
use application\core\Model;


class ModelAuto extends Model{


    public function autoInfo() {

        $aDiscount = Discount::findAll();
        for($i=0; $i<count($aDiscount); $i++) {
            $oModel = ModelAuto::findById($aDiscount[$i]['idModel']);
            $aRezAuto[$i]['name'] = $oModel->getNameModel();
            $aRezAuto[$i]['brend'] = BrandAuto::findById($oModel->getIdBrend())->getnameBrend();
            $aRezAuto[$i]['price'] = $oModel->getPrice();
            $aRezAuto[$i]['percent'] = $aDiscount[$i]['percent'];
            $aRezAuto[$i]['img'] = (ImageAuto::findById(Auto::findById($oModel->getId())->getId())->getImgAuto());
        }
        return $aRezAuto;
    }


}
/**
 * @var int $percent
 * @var int $idModel
 * @var string $description
 */

class Discount extends Model {
    static function TableName(){

        return 'Discount';
    }
}

class ImageAuto extends Model {
    static function TableName(){

        return 'ImageAuto';
    }
}
class Auto extends Model {
    static function TableName(){

        return 'Auto';
    }
}
class BrandAuto extends Model {
    static function TableName(){

        return 'BrandAuto';
    }
}


