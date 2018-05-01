<?php
namespace application\models;
use application\core\Model;

/**
 * @var int $percent
 * @var int $idModel
 * @var string $description
 */

class Discount extends Model {
    public function getModel(){
        return Model::findById($this->getIdModel())->getModelAuto() ?: null;
    }
}