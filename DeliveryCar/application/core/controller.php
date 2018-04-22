<?php

namespace application\core;

class Controller {

    public $oContent;

    function __construct()
    {
        $this->oContent = new BodyHTML('template_view');

        $oMenu = new Menu('menu');

        $oItem = new MenuItem('menu_items');
        $oItem->title = 'Главная';
        $oItem->href = '/';
        $oMenu->addItems($oItem);

        $oItem = new MenuItem('menu_items');
        $oItem->title = 'Автопарк';
        $oItem->href = '/autopark';
        $oMenu->addItems($oItem);

        $oItem = new MenuItem('menu_items');
        $oItem->title = 'Услуги';
        $oItem->href = '/uslugi';
        $oMenu->addItems($oItem);

        $oItem = new MenuItem('menu_items');
        $oItem->title = 'Условия';
        $oItem->href = '/uslovia';
        $oMenu->addItems($oItem);

        $oItem = new MenuItem('menu_items');
        $oItem->title = 'Отзывы';
        $oItem->href = '/otzivi';
        $oMenu->addItems($oItem);

        $oItem = new MenuItem('menu_items');
        $oItem->title = 'О компании';
        $oItem->href = '/about';
        $oMenu->addItems($oItem);

        $oItem = new MenuItem('menu_items');
        $oItem->title = 'Контакты';
        $oItem->href = '/contacts';
        $oMenu->addItems($oItem);

        $this->oContent->Menu->addItem($oMenu);
    }

    // действие (action), вызываемое по умолчанию
    function action_index()
    {
        //todo
    }
}
