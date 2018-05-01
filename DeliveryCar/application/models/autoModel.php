<?php
namespace application\models;
use application\core\Model;

/**
 * @var int $idModel
 * @var int $stateNumber
 * @var string $status
 * @var string $description
 * @var string $nameModel
 * @var string $Brand
 * @var string $BodyAuto
 * @var string $diviz
 * @var int $Transmission
 * @var int $Discount
 * @var int $Deposit
 * @var int $drivingExperience
 * @var int $price
 * @var array $imgOther
 * @var array $option
 * @var array $optionPrice
 */

class Auto extends Model {

    public function getOption(){
        $name = $this->getNameOption();
        $option = [];
        foreach ($name as $value) {
            $price = AdditionalOption::findLineByCategory('nameOptions',$value)->getPrice();
            $option[$price]=$value;
        }
        return $option;
    }

    public function getOptionPrice(){
        return AdditionalOption::getListByCategory('price', 'idModel', $this->getIdModel()) ?: null;
    }


    public function getNameOption(){
        $nameOptions = [];
        $arrayOption = AdditionalOption::findAllObj()->attributes;

        foreach ($arrayOption as $key => $value){
            $nameOptions[] = $value['nameOptions'];
        }

        return $nameOptions?: null;
    }

    public function getImgOther(){
        return ImageAuto::getListByCategory('otherImgAuto', 'idAuto', $this->getId()) ?: null;
    }

    public function getNameModel(){
        if(ModelAuto::findById($this->getIdModel())) {
            return ModelAuto::findById($this->getIdModel())->getNameModel() ?: null;
        }
    }

    public function getBrand(){
        if (ModelAuto::findById($this->getIdModel())&& (ModelAuto::findById($this->getIdModel())->getIdBrand())) {
            return BrandAuto::findById((ModelAuto::findById($this->getIdModel())->getIdBrand()))->getNameBrand() ?: null;
        }
    }

    public function getDrivingExperience(){
        return ModelAuto::findById($this->getIdModel())->getDrivingExperience() ?: null;
    }

    public function getPrice(){
        return ModelAuto::findById($this->getIdModel())->getPrice() ?: null;
    }

    public function getBodyAuto(){
        return BodyAuto::findById($this->getIdModel()->getIdBodyAuto())->getType() ?: null;
    }

    public function getTransmission(){
        $idTrans = ModelAuto::findById($this->getIdModel())->getIdTransmission();

        if($idTrans) {
            return Transmission::findById($idTrans)->getType() ?: null;
        }

        return null;
    }

    public function getPercent(){
        return Discount::findLineByCategory('idModel', $this->getIdModel())?
            Discount::findLineByCategory('idModel', $this->getIdModel())->getPercent()?: null
            : null;
        //return Discount::findLineByCategory('idModel', $this->getIdModel())->getPercent() ?: null;
    }
    public function getDeposit(){
        return Deposit::findLineByCategory('idModel', $this->getModel()->getId())->getDeposit() ?: null;
    }

    public function getImg(){
        if (ImageAuto::findLineByCategory('idAuto', $this->getId())) {
            return ImageAuto::findLineByCategory('idAuto', $this->getId())->getImgAuto() ?: null;
        }
    }

    public function StatusAdd($date)
    {
        //вычисляем занята или свободна машинка в зависимости от даты
        //возврата авто из договора, а также даты окончания страховки и даты окончания ТО

        $oInsuranceAuto = InsuranceAuto::findLineByCategory('idAuto', $this->getId());
        $aReturnDateByRContract = RentalContract::getListByCategory('returnDate', 'idAuto', $this->getId());

        if (!is_null($aReturnDateByRContract)) {
            foreach ($aReturnDateByRContract as $value) {
                $status = ($date > $value) ? 'свободна' : 'арендована';
                if ($status=='арендована') {
                    return static::setStatus($status);
                }
            }
        }
        if (is_null($oInsuranceAuto) && is_null($aReturnDateByRContract)) {
            $status = 'свободна';
            return static::setStatus($status);

        } elseif (!is_null($oInsuranceAuto)) {
            $status = ($date < $oInsuranceAuto->getDateInsEnd() &&  $date < $oInsuranceAuto->getDateToEnd() )? 'свободна' : 'арендована';
            return static::setStatus($status);
        }
    }
}
