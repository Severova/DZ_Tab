<?

namespace application\controllers;

use application\models;
use application\core;

class Controller_Aboutord  extends core\Controller
{
    function action_index()
    {
        $oPages = new core\Pages('page404');

        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }

    function action_information($password)
    {

//        $oPages = new core\Pages('about_ord');
//        $oRentalContract = models\RentalContract::findLineByCategory('password',$password);
//
//
//        $this->oContent->Content->addItem($oPages);
//
//        $this->oContent->render();

        $oRentalContract = models\RentalContract::findLineByCategory('password', $password);
        $oContentAboutOrd = new core\ContentBlock('about_ord');
        $this->oContent->Content->setAboutOrd($oContentAboutOrd);

        $oAboutOrd = new core\AboutOrd('about_ord');

        $oAboutOrd->receiptAutoDate = $oRentalContract->getReceiptAutoDate();
        $oAboutOrd->returnDate = $oRentalContract->getReturnDate();
        $oAboutOrd->price = $oRentalContract->getSumm();

        $oAuto = models\Auto::findById($oRentalContract->getIdAuto());
        $oAboutOrd->brand = $oAuto->getBrand();
        $oAboutOrd->name = $oAuto->getNameModel();
        $oAboutOrd->img = $oAuto->getImg();

        $oOptionId = models\SelectedOption::getListObjectByCategory('idOption','idRcontract', $oRentalContract->getId());
        if($oOptionId){
            foreach ($oOptionId as $value) {
                foreach ($value as $key=>$valueOption) {
                    $aOption[] = models\AdditionalOption::findById($valueOption['idOption']);
                }
            }
        }
        foreach ($aOption as $value){
            foreach ($value as $Opvalue) {
                $aOptions[$Opvalue['price']]=$Opvalue['nameOptions'];
            }
        }
        $oAboutOrd->options = $aOptions;

        $oClient = models\Client::findById($oRentalContract->getIdClient());
        $oAboutOrd->nameClient = $oClient->getFio();
        $oAboutOrd->telephone = $oClient->getPhoneNumber();
        $oAboutOrd->email = $oClient->getEmail();


        $oIdRentalContractOld = models\RentalContract::getListObjectByCategory('id', 'idClient', $oRentalContract->getIdClient());


        foreach ($oIdRentalContractOld as $value) {

                $oRentalContractOld = models\RentalContract::findById($value->getId());

                $oAboutOrdItem = new core\AboutOrdItem('about_ord_item');

                $oAboutOrdItem->receiptAutoDate = $oRentalContractOld->getReceiptAutoDate();
                $oAboutOrdItem->returnDate = $oRentalContractOld->getReturnDate();
                $oAboutOrdItem->price = $oRentalContractOld->getSumm();

                $oAutoItem = models\Auto::findById($oRentalContractOld->getIdAuto());

                $oAboutOrdItem->brand = $oAutoItem->getBrand();
                $oAboutOrdItem->name = $oAutoItem->getNameModel();

                $oAboutOrd->addItems($oAboutOrdItem);
        }

        $this->oContent->Content->addItem($oAboutOrd);

        $this->oContent->render();
    }
}