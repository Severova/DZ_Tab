<div class="revieews-item">
    <?if($img) {?>
        <div class="revieews-item__img">
            <img src="<??>img/Review/<?=$img?>" alt="">
        </div>
    <? } ?>
    <div class="revieews-item__content">
        <? if($titleReviews) { ?>
            <div class="revieews-item__title">
                <?= $titleReviews?>
            </div>
        <? } ?>
        <? if($text) { ?>
            <div class="revieews-item__desc">
                <p><?=$text ?></p>
            </div>
        <? } ?>
        <div class="revieews-item__bot">
            <? if($userName) { ?>
                <div class="revieews-item__name">
                    <?= $userName?>
                </div>
            <? } ?>

            <? if($date) { ?>
                <div class="revieews-item__date">
                    <?=$date?>
                </div>
            <? } ?>
        </div>
    </div>
</div>