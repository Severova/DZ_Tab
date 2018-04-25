<div class="page-ordering">
    <div class="container">
        <h1 class="page-ordering__title">Оформление заказа:</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="page-ordering__left">
                    <div class="page-ordering__photo">
                        <img src="<?= str_replace(' ','',"\\img\\Autopark\\{$brand}\\{$name}\\{$img}") ?>" alt="">

                        <p>Выбраное авто: <span><?= $brand ?> <?= $name ?></span></p>
                    </div>
                    <div class="page-ordering__date">
                        <p>Период бронирования: </p>
                        <label for="" class="form-label">Начало аренды</label>
                        <input type="date" class="form-input lease_start" placeholder="<?php echo $_POST['start_date']; ?>">
                        <label for="" class="form-label">Окончание аренды</label>
                        <input type="date" class="form-input lease_ending" placeholder="<?php echo $_POST['ending_date']; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                    <div class="page-ordering__right">
                        <div class="page-ordering__right-title">
                            Дополнительные опции:
                        </div>

                        <div class="basic-line">
                            Базовая стоимость аренды в день, включая
                            <span><?= $total = ($percent)? (($price*(100-$percent))/100): $price ?> руб.</span>
                        </div>

                        <div class="basic-list">
                            <ul>
                                <li>Неограниченный дневной пробег</li>
                                <li>Страховое покрытие от кражи</li>
                                <li>Страхование ответственности перед третьими лицами (ОСАГО)</li>
                                <li>Страховое покрытие повреждений при столкновении (CDW)</li>
                            </ul>
                        </div>

                        <div class="additional-options">
                            <div class="additional-options__title">
                                Дополнительные опции
                            </div>
                            <?$i=0?>
                            <? foreach ($options as $priceOp => $name) {?>
                                <div class="form-chek">
                                    <input type="checkbox" id="<?=$i?>" data-price="<?=$priceOp?>" class="options_checkbox">
                                    <label for="<?=$i?>"><?=$name?> <?=$priceOp?></label>
                                </div>
                            <?$i++;}?>
                        </div>

                        <div class="user-info">
                            <div class="user-info__title">
                                Информация:
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-input" placeholder="ФИО">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-input" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-input" placeholder="Телефон">
                                </div>
                                <div class="col-md-6">
                                    <select name="" id="">
                                        <option value="1">Где можно забрать</option>
                                        <option value="1">Audi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ordering-bottom">
                        <div class="ordering-itog">
                            Итого<? $start_dates = explode('-', $_POST['start_date']);
                                    $start_date = $start_dates[1].'-'.$start_dates[0].'-'.$start_dates[2];

                                    $ending_dates = explode('-', $_POST['ending_date']);
                                    $ending_date = $ending_dates[1].'-'.$ending_dates[0].'-'.$ending_dates[2];
                            ?>
                            <span><strong class="ordering-itog_st"> <?=$total*(abs(strtotime($start_date)-strtotime($ending_date))/86400)?></strong> руб.</span>
                        </div>
                        <div class="ordering__min">
                            <p>Включая налоги и обязательные сборы</p>
                        </div>
                        <div class="ordering__durability">
                            <p>Длительность аренды : 7 дн.</p>
                        </div>
                        <div class="ordering-submit">
                            <input type="submit" class="btn" value="Оформить">
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>