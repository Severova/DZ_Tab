
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">

    <title> </title>

     <!--Подключение библиотек-->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="libs/selectric/selectric.css">
    <link rel="stylesheet" href="libs/felicegattuso/datedropper.css">
    <link rel="stylesheet" href="libs/OwlCarousel/owl.carousel.min.css">

    <link rel="stylesheet" href="css/main.css">

</head>
<body>

<header class="main-head <? if(true) { ?> home-page <? } ?>"><!--если главная страница-->
    <div class="main-head__line">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="/"><img src="img/logo.png" alt="DeliveryCar"></a>
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
    <?$oSlider->render()?><!--если главная страница-->
</header>


<!--сделать отдельный файлик content-->

<?$oFastReservation->render()?>

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

<!-- Подключение js файлов -->
<script src="libs/jquery/dist/jquery.js"></script>

<script src="libs/selectric/jquery.selectric.js"></script>
<script src="libs/felicegattuso/datedropper.min.js"></script>
<script src="libs/OwlCarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>