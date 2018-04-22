<li class="menu__item">
    <? if ($href): ?>
        <a href="<?= $href ?>" class="menu__link"><?= $title?></a>
    <? else: ?>
        <?= $title?>
    <? endif ?>
</li>

