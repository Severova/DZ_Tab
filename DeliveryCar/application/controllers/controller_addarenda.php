<?

namespace application\controllers;

use application\model;
use application\core;

class Controller_Addarenda extends core\Controller{
    public function __construct(){
    }

    function action_index()
    {
        $endingDate = (isset($_POST['ending_date'])) ? (int)$_POST['ending_date'] : 0;
        var_dump($endingDate);

        $oAutos = model\Auto::findAllObj();
        $statusAuto = [];

        foreach ($oAutos->attributes as $value) {
            $oAuto = model\Auto::findById($value['id']);
            $oAuto->StatusAdd($endingDate);
            $statusAuto[$oAuto->getNameModel()] = $oAuto->getStatus();
        }

        var_dump( $statusAuto);
    }
}