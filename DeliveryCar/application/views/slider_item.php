<div class="head-stock__item">
	<div class="head-stock__img">
		<img src="<?= str_replace(' ','',"img\Autopark\\{$brend}\\{$name}\\{$img}") ?>" alt="">
	</div>
	<div class="head-stock__content">
		<div class="head-stock__title">
            <?= $brend ?> <?= $name ?>
		</div>
		<div class="head-stock__price">
			<strong><? echo (($price*(100-$percent))/100) ?></strong> <span><?= $price ?></span> руб./час
		</div>
		<div class="head-stock__link">
			<a href="#" class="btn">Заказать</a>
		</div>
	</div>
</div>
