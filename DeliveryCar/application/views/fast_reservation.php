<div class="quick-reservation">
    <div class="container">
        <div class="row">
            <!---->
            <div class="col-md-3">
                <div class="quick-reservation__left">
                    <div class="quick-reservation__title">
                        <h2>Быстрое бронирование:</h2>
                    </div>
                    <div class="quick-reservation__form">
                        <input type="date" class="form-input lease_start" placeholder="Начало аренды">
                        <input type="date" class="form-input lease_ending" placeholder="Окончание аренды" >
                        <select name="" id="select">

                            <option value="0">Все марки</option>
                            <?if ($brand) {
                                foreach ($brand as $number => $nameBrand) {?>
                                    <option value="<?=$number+1?>"><?= strtoupper($nameBrand) ?></option>
                                <?}
                            }?>

                        </select>
                    </div>
                </div>
            </div>
            <!---->
            <div class="col-md-9">
                <div class="quick-reservation__right">
                    <div class="home-car-list scrollbar-inner">


                        <? foreach ( $items as $item): ?>
                            <? $item->render()?>
                        <? endforeach ?>



                    </div>
                </div>
            </div>
            <!---->
        </div>
    </div>
</div>