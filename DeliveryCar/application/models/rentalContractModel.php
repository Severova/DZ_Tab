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
 * @var string $password
 */

class RentalContract extends Model {

    public function addPassword(){
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=rand(5, 12);
        $size=StrLen($chars)-1;
        $password='p';

        while($max--)
            $password.=$chars[rand(0,$size)];

        return static::setPassword($password);

    }



}
