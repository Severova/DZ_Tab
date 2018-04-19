<li class="menu__item">
    <? if ($href): ?>
        <a href="<?= $href ?>" class="menu__link"><?= $title?></a>
    <? else: ?>
        <?= $title?>
    <? endif ?>

    <? if ($items): ?>
        <ul class="menu">
            <? foreach ( $items as $item): ?>
                <? $item->render() ?>
            <? endforeach ?>
        </ul>
    <?endif;?>
</li>

