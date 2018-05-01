<?

namespace application\controllers;

use application\models;
use application\core;

class Controller_Contacts extends core\Controller{

    function action_index()
    {

        $oPages = new core\Pages('contacts');

        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }
}