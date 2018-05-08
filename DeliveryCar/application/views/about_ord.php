<div class="page-profile">
    <div class="container">
        <div class="col-md-8">
            <div class="profile-order">
                <div class="profile-order__title">
                    Ваш заказ:
                </div>
                <div class="profile-order__active">
                    <div class="profile-order__active-img">
                        <img src="<?= str_replace(' ','',"\\img\\Autopark\\{$brand}\\{$name}\\{$img}") ?>" alt="">
                    </div>
                    <div class="profile-order__active-cont">
                        <div class="profile-order__active-title">
                            <a href="#"><?=$brand?> <?=$name?></a>
                        </div>
                        <div class="profile-order__active-time">
                            <div class="profile-order__active-mt">
                                Забронировано:
                            </div>
                            <p>с <?=$receiptAutoDate?> по <?=$returnDate?></p>
                        </div>
                        <div class="profile-order__active-option">
                            <div class="profile-order__active-mt">
                                Дополнительные опции:
                            </div>
                            <ul>
                            <? if($options) {
                                foreach ($options as $priceOp => $nameOp) {?>
                                    <li><?=$nameOp?> <span>(цена: <?=$priceOp?>)</span></li>
                                <?}
                            }?>
                            </ul>
                        </div>
                        <div class="profile-order__active-price">
                            <p>Цена: <span><?=$price ?></span></p>
                        </div>
                    </div>
                </div>
                <div class="profile-order__old-btn">
                    <span>Предыдущие заказы</span>
                </div>
                <div class="profile-order__old">
                    <div class="profile-order__old-item">
                        <div class="profile-order__old-item_num">

                        </div>
                        <div class="profile-order__old-item_auto">
                            Авто:
                        </div>
                        <div class="profile-order__old-item_data">
                            Дата:
                        </div>
                        <div class="profile-order__old-item_price">
                            Цена:
                        </div>
                    </div>


                <!---->
                <? foreach ( $items as $item): ?>
                    <? $item->render()?>
                <? endforeach ?>
                    <!---->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="profile-info">
                <div class="profile-info__title">
                    Информация о пользователе:
                </div>
                <form action="http://deliverycar/newinfo" method="post">
                    <div class="profile-info__form">
                        <input type="text" value="<?=$nameClient?>" class="form-input" name="nameClient">
                        <input type="tel" value="<?=$telephone?>" class="form-input" name="telephone">
                        <input type="email" value="<?=$email?>" class="form-input" name="email">
                        <input type="submit" class="btn" value="Обновить">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>