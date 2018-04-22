<div class="car-park-block">
    <div class="car-park-block__logo">
        <img src="img/audi.png" alt=""> <p>Список авто: <h2></h2></p>
    </div>
    <div class="car-park-block__list">

        <? foreach ( $items as $item): ?>
            <? $item->render()?>
        <? endforeach ?>

    </div>
</div>