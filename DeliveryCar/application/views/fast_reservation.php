
<div class="quick-reservation">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="quick-reservation__left">
                    <div class="quick-reservation__title">
                        <h2>Быстрое бронирование:</h2>
                    </div>
                    <div class="quick-reservation__form">
                        <input type="date" class="form-input" data-lang="ru" data-large-mode="true" data-translate-mode="false" data-auto-lang="true" data-default-date="<?=date ('M-j-Y')?>" data-id="datedropper-0" data-theme="calendar" readonly="">
                        <input type="date" class="form-input" data-lang="ru" data-large-mode="true" data-translate-mode="false" data-auto-lang="true" data-default-date="<?=date ('M-j-Y')?>" data-id="datedropper-0" data-theme="calendar" readonly="">
                        <select name="" id="">
                            <option value="1"><?= $brand ?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="quick-reservation__right">
                    <div class="home-car-list scrollbar-inner">

                        <? foreach ( $items as $item): ?>
                            <? $item->render()?>
                        <? endforeach ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>