<div class="quick-reservation">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="quick-reservation__left">
                    <div class="quick-reservation__title">
                        <h2>Быстрое бронирование:</h2>
                    </div>
                    <div class="quick-reservation__form">
                        <!--Поменять дату на текущую и изменить цвета-->
                        <input type="date" class="form-input" data-lang="ru" data-large-mode="true" data-translate-mode="false" data-auto-lang="true" data-default-date="09-14-1989" data-id="datedropper-0" readonly="">
                        <input type="date" class="form-input" data-lang="ru" data-large-mode="true" data-translate-mode="false" data-auto-lang="true" data-default-date="09-14-1989" data-id="datedropper-0" readonly="">
                        <select name="" id="">
                            <!--Сделать динамически-->
                            <option value="1">BMW</option>
                            <option value="1">Audi</option>
                            <!---->
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="quick-reservation__right">
                    <div class="home-car-list">

                        <? foreach ( $items as $item): ?>
                            <? $item->render()?>
                        <? endforeach ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>