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
                        <p>Период бронирования:</p>
                        <label for="" class="form-label">Начало</label>
                        <input type="date" class="form-input" data-lang="ru" data-large-mode="true" data-translate-mode="false" data-auto-lang="true"
                               data-default-date="09-14-1989" data-id="datedropper-0" data-theme="calendar" readonly="">
                        <label for="" class="form-label">Конец</label>
                        <input type="date" class="form-input" data-lang="ru" data-large-mode="true" data-translate-mode="false" data-auto-lang="true"
                               data-default-date="09-14-1989" data-id="datedropper-0" data-theme="calendar" readonly="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="page-ordering__right">
                    <div class="page-ordering__right-title">
                        Выбор дополнений
                    </div>

                    <div class="basic-line">
                        Базовая стоимость аренды в день, включая
                        <span><?= ($percent)? (($price*(100-$percent))/100): $price ?> руб.</span>
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
                        <div class="form-chek">
                            <input type="checkbox" id="options1">
                            <label for="options1">Второй водитель</label>
                        </div>
                        <div class="form-chek">
                            <input type="checkbox" id="options2">
                            <label for="options2">Навигационная система</label>
                        </div>
                        <div class="form-chek">
                            <input type="checkbox" id="options3">
                            <label for="options3">Детское автокресло</label>
                        </div>
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
                                <input type="text" class="form-input" placeholder="Email">
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
                        Итого:
                        <span>46 201 руб.</span>
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