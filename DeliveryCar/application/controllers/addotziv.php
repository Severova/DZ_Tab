<?
namespace  application\controllers;

use application\core;
use application\models;

class Controller_Addotziv extends core\Controller
{

    function action_index()
    {

        $oPages = new core\Pages('addotziv');



        $errors = [];
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];


        $oReview = new models\Reviews();
        $oReview -> setUserName($_POST['userName'])
                 -> setTitleReviews($_POST['titleReviews'])
                 -> setText($_POST['text'])
                 -> setDate(date('Y-m-d'))
                 -> setEmail($_POST['email'])
                 -> setStatus('проверяется')
                 -> setImg($_FILES['file']['name']);
        $oReview->save();

        if($file_size>2097152){
            $oPages->setText('Размер файла не должен превышать 2 мб');
        }

        if(empty($errors)){
            move_uploaded_file($file_tmp, 'img/Review/'.$file_name);
            $oPages->setText( "<h1>Спасибо за ваш отзыв!</h1> <p>Мы будем работать еще лучше.</p>");
        }

        $this->oContent->Content->addItem($oPages);

        $this->oContent->render();
    }
}