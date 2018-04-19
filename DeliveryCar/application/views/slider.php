<div class="head-stock">
    <div class="container">
        <div class="head-stock__slider owl-carousel owl-theme">

            <? foreach ( $items as $item): ?>
                <? $item->render()?>
            <? endforeach ?>

        </div>
    </div>
</div>