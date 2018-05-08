<?

namespace application\controllers;

use application\models;
use application\core;

class Controller_Page404 extends core\Controller{

    function action_index()
    {

        $oPages = new core\Pages('page404');

        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }
}