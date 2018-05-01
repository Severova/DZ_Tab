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
                        <input type="date" class="form-input lease_start_order" value="<?php echo $_POST['start_date']; ?>">
                        <label for="" class="form-label">Окончание аренды</label>
                        <input type="date" class="form-input lease_ending_order" value="<?php echo $_POST['ending_date']; ?>">
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
                        <span><strong class = "js-total_cost-old"><?= $total = ($percent)? (($price*(100-$percent))/100): $price ?></strong> руб.</span>
                    </div>

                    <div class="basic-list">
                        <ul>
                            <li>Неограниченный дневной пробег</li>
                            <li>Страховое покрытие от кражи</li>
                            <li>Страхование ответственности перед третьими лицами (ОСАГО)</li>
                            <li>Страховое покрытие повреждений при столкновении (CDW)</li>
                        </ul>
                    </div>
                    <form method="POST" action="/addord">

                        <div class="additional-options">
                            <div class="additional-options__title">
                                Дополнительные опции
                            </div>
                            <? if($options) {
                                $i=0;
                                foreach ($options as $priceOp => $nameOp) {?>
                                <div class="form-chek">
                                    <input type="checkbox" id="chek<?=$i?>" data-price="<?=$priceOp?>" value = "<?=$nameOp?>" class="options_checkbox" name="chb[]">
                                    <label for="chek<?=$i?>"><?=$nameOp?> <span><?=$priceOp?></span></label>
                                </div>
                                <?$i++;
                                }
                            }?>
                        </div>

                        <div class="user-info">
                            <div class="user-info__title">
                                Информация:
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-input" name="FIO" placeholder="ФИО" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-input" name = "email" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-input" name = "telephone" placeholder="Телефон" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-input" name = "place" placeholder="Где можно забрать" required>
                                </div>
                                    <input type="hidden" value="<?php echo $_POST['start_date']; ?>" name="start_date">
                                    <input type="hidden" value="<?php echo $_POST['ending_date']; ?>" name="ending_date">
                                    <input type="hidden" value="<?= $name ?>" name="name_auto">
                            </div>
                        </div>
                    </div>

                    <div class="ordering-bottom">
                        <div class="ordering-itog">
                            Итого
                            <? $start_dates = explode('-', $_POST['start_date']);
                                $start_date = $start_dates[1].'-'.$start_dates[0].'-'.$start_dates[2];

                                $ending_dates = explode('-', $_POST['ending_date']);
                                $ending_date = $ending_dates[1].'-'.$ending_dates[0].'-'.$ending_dates[2];
                            ?>
                            <span><strong class="ordering-itog_st js-total_cost-new"> <?=$total*(abs(strtotime($start_date)-strtotime($ending_date))/86400)?></strong> руб.</span>
                        </div>
                        <div class="ordering__min">
                            <p>Включая налоги и обязательные сборы</p>
                        </div>
                        <div class="ordering__durability">
                            <?if (($start_date)&&($ending_date)) { ?><p>Длительность аренды : <span><?=abs(strtotime($start_date)-strtotime($ending_date))/86400?></span> дн.</p> <? } ?>
                        </div>
                        <input type="hidden" value="<?=$total*(abs(strtotime($start_date)-strtotime($ending_date))/86400)?>" name="summ">
                        <div class="ordering-submit">
                            <input type="submit" class="btn" value="Оформить">
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>