
<div class="car-item <? if ($percent) {?> car-stock <?} ?>">
    <div class="car-item__img">
        <? if ($img) {?><img src="<?= str_replace(' ','',"img\Autopark\\{$brand}\\{$name}\\{$img}") ?>" alt=""><? } ?>
    </div>
    <div class="car-item__content">
        <div class="car-item__title">
            <h3><a href="/autopark/info/<?= str_replace(' ','_',$name) ?>"><?= strtoupper($brand) ?> <?= strtoupper($name) ?></a></h3>
        </div>
        <div class="car-item__options">
            <ul>
                <?if ($transmission) { ?> <li><span>Коробка передач:</span> <?= $transmission; }?> </li>
                <?if ($drivingExperience) { ?> <li><span>Мин. стаж:</span> <?= $drivingExperience; }?> лет</li>

            </ul>
        </div>
        <div class="car-item__bottom">
            <div class="car-item__price">
                <strong><?= ($percent)? (($price*(100-$percent))/100): $price ?></strong> <span><?if ($percent) echo $price ?></span> руб./сутки
            </div>
            <div class="car-item__link">
                <a href="/autopark/info/<?= str_replace(' ','_',$name) ?>" class="btn">Подробнее</a>
            </div>
        </div>
    </div>
</div>