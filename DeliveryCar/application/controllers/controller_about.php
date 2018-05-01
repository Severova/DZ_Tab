<?

namespace application\controllers;

use application\models;
use application\core;

class Controller_About extends core\Controller{

    function action_index()
    {

        $oPages = new core\Pages('about');

        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }
}