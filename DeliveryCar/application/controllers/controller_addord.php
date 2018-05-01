<?
namespace  application\controllers;

use application\core;
use application\models;
use DateTime;

class Controller_Addord extends core\Controller
{

    function action_index()
    {
        $oPages = new core\Pages('addotziv');

        $oClient = new models\Client();
        $oClientOld = models\Client::findLineByCategory('fio',$_POST['FIO']);
        if($oClientOld){
            $oClient ->setId($oClientOld->getId());
        }

        $oClient -> setFio($_POST['FIO'])
                 -> setPhoneNumber($_POST['telephone'])
                 -> setEmail($_POST['email']);
        $oClient->save();

        $endingDate = $_POST['ending_date'];
        $startDate = $_POST['start_date'];

        $dateStart = DateTime::createFromFormat('m-d-Y', $startDate)->format('Y-m-d');
        $dateEnding = DateTime::createFromFormat('m-d-Y', $endingDate)->format('Y-m-d');

        $oRentalContract = new models\RentalContract();
        $oRentalContract -> setIdClient( $oClient->getId())
                         -> setReceiptAutoDate($dateStart)
                         -> setPlaceReceipt($_POST['place'])
                         -> setReturnDate($dateEnding)
                         -> setIdAuto(models\Auto::findLineByCategory('idModel', models\ModelAuto::findLineByCategory('nameModel',$_POST['name_auto'])->getId())->getId())
                         -> setSumm($_POST['summ']);
        $oRentalContract->save();


        if (isset($_POST['chb'])) {
            foreach ($_POST['chb'] as $key => $value) {
                $oSelectedOption = new models\SelectedOption();
                $oSelectedOption -> setIdRcontract($oRentalContract->getId())
                                 -> setIdOption(models\AdditionalOption::findLineByCategory('nameOptions', $value)->getId());
                $oSelectedOption -> save();
            }
        }

        $oPages->setText( "<h1>Спасибо за ваш заказ!</h1> <p>Наш менеджер перезвонит вам в течении 20 минут.</p>");

        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }
}