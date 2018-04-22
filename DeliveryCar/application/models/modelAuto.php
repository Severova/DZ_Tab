<?php

namespace application\model;

use application\core\Model;


/**
 * @var int $idBrand
 * @var int $idBodyAuto
 * @var int $idTransmission
 * @var string $nameModel
 * @var string $Brand
 * @var string $BodyAuto
 * @var int $Discount
 * @var int $Deposit
 */
class ModelAuto extends Model {

    public function getBrand(){
            return BrandAuto::findById($this->getIdBrand())->getnameBrand() ?: null;
    }
    public function getBodyAuto(){
        return BodyAuto::findById($this->getIdBodyAuto())->getType() ?: null;
    }
    public function getTransmission(){
        return Transmission::findById($this->getIdTransmission())->getType() ?: null;
    }
    public function getDiscount(){
        return Discount::findLineByCategory('idModel', $this->getId())->getPercent() ?: null;
    }
    public function getDeposit(){
        return Deposit::findLineByCategory('idModel', $this->getId())->getDeposit() ?: null;
    }
}