<div class="bread-crumbs-block">
    <div class="container">
        <ul class="bread-crumbs">
            <li class="bread-crumbs__item"><a href="./">Главная</a></li>
            <li class="bread-crumbs__item"><span>Автопарк</span></li>
        </ul>
    </div>
</div>

<div class="page-title">
    <div class="container">
        <h1>Автопарк</h1>
    </div>
</div>

<div class="container">

    <? foreach ( $items as $item): ?>
        <?$item->render()?>
    <? endforeach ?>

</div>

