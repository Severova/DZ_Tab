<?

namespace application\controllers;

use application\models;
use application\core;

class Controller_Uslugi extends core\Controller{

    function action_index()
    {

        $oPages = new core\Pages('uslugi');

        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }
}