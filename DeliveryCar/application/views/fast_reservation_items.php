<div class="car-item car-stock">
    <div class="car-item__img">
        <img src="<?= str_replace(' ','',"img\Autopark\\{$brend}\\{$name}\\{$img}") ?>" alt="">
    </div>
    <div class="car-item__content">
        <div class="car-item__title">
            <h3><a href="#"><?= $brend ?> <?= $name ?></a></h3>
        </div>
        <div class="car-item__options">
            <ul>
                <li><span>Коробка передач:</span> <?= $transmission ?></li>
                <li><span>Мин. стаж:</span> <?= $drivingExperience ?> лет</li>
            </ul>
        </div>
        <div class="car-item__bottom">
            <div class="car-item__price">
                <strong><? echo (($price*(100-$percent))/100) ?></strong> <span><?= $price ?></span> руб./сутки
            </div>
            <div class="car-item__link">
                <a href="#" class="btn">Забронировать</a>
            </div>
        </div>
    </div>
</div>