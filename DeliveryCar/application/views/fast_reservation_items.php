<div class="car-item <? if ($percent) {?> car-stock <?} ?>">
    <div class="car-item__img">
        <img src="<?= str_replace(' ','',"img\Autopark\\{$brand}\\{$name}\\{$img}") ?>" alt="">
    </div>
    <div class="car-item__content">
        <div class="car-item__title">
            <h3><a href="/autopark/info/<?= str_replace(' ','_',$name) ?>"><?= $brand ?> <?= $name ?></a></h3>
        </div>
        <div class="car-item__options">
            <ul>
                <li><span>Коробка передач:</span> <?= $transmission ?></li>
                <li><span>Мин. стаж:</span> <?= $drivingExperience ?> лет</li>
            </ul>
        </div>
        <div class="car-item__bottom">
            <div class="car-item__price">
                <strong><? echo (($price*(100-$percent))/100) ?></strong> <span><?if ($percent) echo $price ?></span> руб./сутки
            </div>
            <div class="car-item__link">
                <a href="#" class="btn">Забронировать</a>
            </div>
        </div>
    </div>
</div>