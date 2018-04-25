<div class="head-stock__item">
	<div class="head-stock__img">
		<img src="<?= str_replace(' ','',"img\Autopark\\{$brand}\\{$name}\\{$img}") ?>" alt="">
	</div>
	<div class="head-stock__content">
		<?if($brand) {?><div class="head-stock__title">
            <?= strtoupper($brand) ?> <?= strtoupper($name) ?>
		</div><? } ?>
		<div class="head-stock__price">
			<strong><? if ($percent) echo (($price*(100-$percent))/100) ?></strong> <span><? if ($price) echo $price ?></span> руб./час
		</div>
		<div class="head-stock__link">
			<a href="#" class="btn">Заказать</a>
		</div>
	</div>
</div>
