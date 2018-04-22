<?php
namespace application\model;
use application\core\Model;

/**
 * @var int $idClient
 * @var string $conclusionDate
 * @var string $receiptAutoDate
 * @var string $receiptAutoTime
 * @var string $placeReceipt
 * @var string $returnDate
 * @var string $returnTime
 * @var string $placeReturn
 * @var int $summ
 */

class RentalContract extends Model {

    public $idAuto;
    public $receiptAutoDate;
    public $returnDate;
    public $summ;


    public function SummAdd($summ) {
        //вычисление итоговой суммы исходя из стоимости авто, залога,
        //а также выбранных дополнительных опций, скидки
        //Переписать исходя из новых классов

        $oModelAuto = ModelAuto::findById(Auto::getListByCategory('idModel', 'id', $this->idAuto));
        $oDiscount = Discount::findLineByCategory('idModel', $oModelAuto->getId());
        $aIdOption = SelectedOption::getListByCategory('idOption','idRcontract',$this->id);

        for ($i = 0; $i < count($aIdOption); $i++){
            $summ += AdditionalOption::findLineByCategory('id', $aIdOption[$i])->getPrice();
        }

        $count = (strtotime($this->returnDate) - strtotime($this->receiptAutoDate))/86400;

        $summ += $count * $oModelAuto->getPrice();
        $summ *= (100 - $oDiscount->getPercent())/100;
        $summ += Deposit::getListByCategory('priceDeposit','idModel', $oModelAuto->getId());

        return static::setSumm($summ);

    }
}
