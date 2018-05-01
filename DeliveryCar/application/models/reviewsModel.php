<?php
namespace application\models;
use application\core\Model;

/**
 * @var string $userName
 * @var string $titleReviews
 * @var string $text
 * @var string $date
 * @var string $time
 * @var string $email
 * @var string $img
 */

class Reviews extends Model {
    static function TableName(){

        return 'reviews';
    }


}