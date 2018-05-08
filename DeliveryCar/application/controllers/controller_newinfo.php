<?
namespace  application\controllers;

use application\core;
use application\models;
use DateTime;

class Controller_Newinfo extends core\Controller
{

    function action_index()
    {
        $oPages = new core\Pages('addotziv');

        $oClient = new models\Client();
        $oClientOld = models\Client::findLineByCategory('fio',$_POST['nameClient']);
        if($oClientOld){
            $oClient ->setId($oClientOld->getId());
        }

        $oClient -> setFio($_POST['nameClient'])
            -> setPhoneNumber($_POST['telephone'])
            -> setEmail($_POST['email']);
        $oClient->save();

        $oPages->setText( "<h1>Данные изменены!</h1>");


        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }
}