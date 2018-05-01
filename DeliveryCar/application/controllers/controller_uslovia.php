<?

namespace application\controllers;

use application\models;
use application\core;

class Controller_Uslovia extends core\Controller{

    function action_index()
    {

        $oPages = new core\Pages('uslovia');

        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }
}