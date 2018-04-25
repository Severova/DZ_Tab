<?
/**
 * @var \application\core\ContentBlock $oMenu
 * @var \application\core\ContentBlock $oSlider
 * @var \application\core\ContentBlock $oContent
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title> </title>

    <!--Для адаптации-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <!--Подключение библиотек-->
    <link rel="stylesheet" href="/libs/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/libs/selectric/selectric.css">
    <link rel="stylesheet" href="/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="/libs/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/libs/scrollbar/jquery.scrollbar.css">
    <link rel="stylesheet" href="/libs/fotorama/fotorama.css" />

    <link rel="stylesheet" href="/css/main.css">


</head>
<body>

<header class="main-head ">
    <div class="main-head__line">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="/"><img src="/img/logo.png" alt="DeliveryCar"></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <? $oMenu->render() ?>
                </div>
                <div class="col-md-3">
                    <div class="head-contact">
                        <a href="tel:+7 (495) 528 40 55" class="head-phone">+7 (495) 528 40 55</a><br>
                        <a href="#" class="popup-link">Заказать звонок</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <? $contr = explode('/', $_SERVER['REQUEST_URI'])[1];
        if($contr=='Main' || $contr=='') $oSlider->render()
    ?><!--если главная страница-->

</header>


<!--сделать отдельный файлик content-->

<? $oContent->render() ?>

<!---->
    
<footer class="main-footer">
    <div class="container">
        <div class="footer-line">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <a href="/"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-8">
                   <? $oMenu->render() ?>
                </div>
            </div>
        </div>
        <div class="footer-contact">
            <a href="tel:+7 (495) 528 40 55" class="footer-phone">+7 (495) 528 40 55</a>
            <p>Старый Арбат д.9 корпус 2, въезд с улицы Пушкина</p>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="coperight">
                <p>© 2018 Все права защищены</p>
            </div>
        </div>
    </div>
</footer>
<div class="hidden"></div>

<!-- Подключение js файлов -->

<script src="/libs/jquery/dist/jquery.js"></script>
<script src="/libs/selectric/jquery.selectric.js"></script>
<script src="/libs/flatpickr/flatpickr.min.js"></script>
<script src="/libs/flatpickr/l10n/ru.js"></script>
<script src="/libs/OwlCarousel/owl.carousel.min.js"></script>
<script src="/libs/scrollbar/jquery.scrollbar.min.js"></script>
<script src="/libs/fotorama/fotorama.js"></script>
<script src="/js/main.js"></script>
<script src="/js/ajax.js"></script>

</body>
</html>