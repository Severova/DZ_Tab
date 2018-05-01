<?

namespace application\controllers;

use application\models;
use application\core;

class Controller_Otzivi extends core\Controller{

    function action_index()
    {
        $oReviews = models\Reviews::findAllObj();
        $oContentOtzivi = new core\ContentBlock('otzivi');
        $this->oContent->Content->setOtzivi($oContentOtzivi);

        $oOtzivi = new core\Otzivi('otzivi');

        foreach ($oReviews->attributes as $value) {

            $oReview = models\Reviews::findById($value['id']);

            $oItemOtzivi = new core\OtziviItem('otzivi_item');
            if ($oReview->getStatus()=='опубликован') {
                $oItemOtzivi->userName = $oReview->getUserName();
                $oItemOtzivi->titleReviews = $oReview->getTitleReviews();
                $oItemOtzivi->text = $oReview->getText();
                $oItemOtzivi->date = $oReview->getDate();
                $oItemOtzivi->email = $oReview->getEmail();
                $oItemOtzivi->img = $oReview->getImg();

                $oOtzivi->addItems($oItemOtzivi);
            }

        }

        $this->oContent->Content->addItem($oOtzivi);

        $this->oContent->render();
    }
}