<div class="bread-crumbs-block">
    <div class="container">
        <ul class="bread-crumbs">
            <li class="bread-crumbs__item"><a href="/">Главная</a></li>
            <li class="bread-crumbs__item"><a href="/autopark">Автопарк</a></li>
            <?if ($brand) { ?> <li class="bread-crumbs__item"><span><?=$brand?> <? if($name) echo $name ?></span></li> <? } ?>
        </ul>
    </div>
</div>

<div class="page-single-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="auto-gallery">
                    <div class="fotorama_car">
                        <!---->

                        <? if($img) {

                            foreach ($img as $value) { ?>
                                <img src="<? echo str_replace(' ', '', "\\img\\Autopark\\{$brand}\\{$name}\\{$value}") ?>"
                                     alt="">
                            <? }
                        }?>


                        <!---->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-auto__info">
                    <div class="page-auto__title">
                        <?if ($brand) { ?> <h1><?=$brand?> <? if($name) echo $name ?></h1><? } ?>
                    </div>
                    <div class="page-auto__price">
                        <strong><?= ($percent)? (($price*(100-$percent))/100): $price ?></strong> <span><?if ($percent) echo $price ?></span> руб./сутки

                    </div>

                    <div class="page-auto__options">
                        <ul>
                            <?if ($transmission) { ?><li><span>Коробка передач:</span> <?= $transmission ?></li><? } ?>
                            <?if ($drivingExperience) { ?><li><span>Мин. стаж:</span> <?= $drivingExperience ?></li><? } ?>
                        </ul>
                    </div>

                    <div class="page-auto__form">
                        <div class="page-auto__form-title">
                            Арендовать
                        </div>
                        <div class="page-auto__form-wrap">
                            <form action="/order/add/<?= str_replace(' ','_',$name) ?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Начало</label>
                                        <input type="date" class="form-input lease_start" placeholder="Начало аренды">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Конец</label>
                                        <input type="date" class="form-input lease_ending" placeholder="Окончание аренды">
                                    </div>
                                </div>
                                <div class="total-price-block">
                                    <p>Итоговая стоимость: </p>
                                    <div class="js-total_cost">
                                        <span class="js-total_cost-old" style="display: none;"><?= ($percent)? (($price*(100-$percent))/100): $price ?></span>
                                        <div class="js-total_cost-new"></div>
                                    </div>
                                </div>
                                <input type="hidden" value="" name="start_date">
                                <input type="hidden" value="" name="ending_date">
                                <input type="submit" class="btn" value="Забронировать">


                                <div class="page-auto__mes">
                                    <? if($status == 'арендована'){ ?> <p>Данное авто забронировано до 20.06.2018</p> <? } ?>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="page-auto__desc">
            <h2>Описание:</h2>
            <p><strong><?=$brand?> <?= $name ?></strong> <?= $description ?></p>
            <? if($diviz){ ?><p><i><?=$diviz?></i></p> <? } ?>
        </div>
    </div>
</div>