<?php
namespace application\models;
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
 * @var int $idAuto
 * @var int $summ
 * @var int $idSelectedOption
 */

class RentalContract extends Model {

    public $idAuto;
    public $receiptAutoDate;
    public $returnDate;
    public $summ;



}
