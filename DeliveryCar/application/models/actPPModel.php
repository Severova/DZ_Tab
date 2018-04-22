<?php
namespace application\model;
use application\core\Model;

/**
 * @var int $idRcontract
 * @var string $dateAct
 * @var int $sumFinesGibdd
 * @var int $sumFines
 */

class ActPP extends Model {

    public $idRcontract;
    public $dateAct;
    public $sumFinesGibdd;

    public function sumFinesAdd() {
        //сумма складывается из штрафов за гибдд и из штрафа за нарушение срока
        //который свою очередь вычисляется след образом: высчитывается продолжительность задержки авто
        //(дата возврата авто по договору - дата акта возврата авто) и умножается на стоимость авто в день
        $oRentalContract = RentalContract::findById($this->idRcontract);
        $oModelAuto = ModelAuto::findById((Auto::findById($oRentalContract->idAuto))->getIdModel());

        $count = (strtotime($this->dateAct) - strtotime($oRentalContract->receiptAutoDate))/86400;
        $sumFines = $count > 0 ? $count * ($oModelAuto->getPrice()) : 0;
        $sumFines+=$this->sumFinesGibdd;

        return static::setSumFines($sumFines);
    }
}