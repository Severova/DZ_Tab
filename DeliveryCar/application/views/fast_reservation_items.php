<div class="car-item <? if ($percent) {?> car-stock <?} ?>">
    <div class="car-item__img">
        <img src="<?= str_replace(' ','',"img\Autopark\\{$brand}\\{$name}\\{$img}") ?>" alt="">
    </div>
    <div class="car-item__content">
        <div class="car-item__title">
            <h3><a href="/autopark/info/<?= str_replace(' ','_',$name) ?>"><?= strtoupper($brand) ?> <span class="name_model"><?= strtoupper($name) ?></span></a></h3>
        </div>
        <div class="car-item__options">
            <ul>
                <?if ($transmission) { ?> <li><span>Коробка передач:</span> <?= $transmission ?></li> <? } ?>
                <?if ($drivingExperience) { ?> <li><span>Мин. стаж:</span> <?= $drivingExperience ?> лет</li> <? } ?>
                <div class="js-status" id="auto_<?= str_replace(' ','_',$name) ?>"></div>
                <div class="total-price-block">
                    <p>Итоговая стоимость: </p>
                    <div class="js-total_cost">
                        <span class="js-total_cost-old" style="display: none;"><?= ($percent)? (($price*(100-$percent))/100): $price ?></span>
                        <div class="js-total_cost-new"></div>
                    </div>
                </div>
            </ul>
        </div>

        <div class="car-item__bottom">
            <div class="car-item__price">
                <strong><?= ($percent)? (($price*(100-$percent))/100): $price ?></strong> <span><?if($percent) echo $price ?></span> руб./сутки
            </div>
            <div class="car-item__link">
                <form action="/order/add/<?= str_replace(' ','_',$name) ?>" method="POST">
                    <input type="hidden" value="" name="start_date">
                    <input type="hidden" value="" name="ending_date">
                    <input type="submit" class="btn" value="Забронировать">
                </form>
            </div>
        </div>
    </div>
</div>