<?

namespace application\controllers;

use application\models;
use application\core;
use DateTime;

class Controller_Addarenda extends core\Controller{
    public function __construct(){
    }

    function action_index()
    {
        $endingDate = (isset($_POST['ending_date'])) ? $_POST['ending_date'] : 0;


        $str_to_date = DateTime::createFromFormat('d-m-Y', $endingDate)->format('Y-d-m');


        //var_dump( $str_to_date);

        $oAutos = models\Auto::findAllObj();
        $statusAuto = [];

        foreach ($oAutos->attributes as $value) {
            $oAuto = models\Auto::findById($value['id']);
            $oAuto->StatusAdd($str_to_date);
            $statusAuto[$oAuto->getNameModel()] = $oAuto->getStatus();
        }
        echo json_encode($statusAuto);
        //var_dump ($statusAuto);
    }
}