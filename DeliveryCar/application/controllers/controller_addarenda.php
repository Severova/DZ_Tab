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
        $startDate = (isset($_POST['lease_start'])) ? $_POST['lease_start'] : 0;
        if($endingDate!=0) {


            $str_to_date = DateTime::createFromFormat('m-d-Y', $endingDate)->format('Y-m-d');


            //var_dump( $str_to_date);

            $oAutos = models\Auto::findAllObj();
            $statusAuto = [];

            foreach ($oAutos->attributes as $value) {
                $oAuto = models\Auto::findById($value['id']);
                $oAuto->StatusAdd($startDate, $str_to_date);
                $statusAuto[$oAuto->getNameModel()] = $oAuto->getStatus();
            }
            //echo json_encode($statusAuto);
            var_dump($statusAuto);
        }

    }
}