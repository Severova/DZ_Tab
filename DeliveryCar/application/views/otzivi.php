<div class="bread-crumbs-block">
    <div class="container">
        <ul class="bread-crumbs">
            <li class="bread-crumbs__item"><a href="./">Главная</a></li>
            <li class="bread-crumbs__item"><span>Отзывы</span></li>
        </ul>
    </div>
</div>

<div class="page-title">
    <div class="container">
        <h1>Отзывы</h1>
    </div>
</div>

<div class="revieews-wrap">
    <div class="container">
        <div class="revieews-left">
            <? foreach ( $items as $item): ?>
                <? $item->render()?>
            <? endforeach ?>
        </div>
        <div class="revieews-right">
            <div class="revieews-form">
                <div class="revieews-form__title">
                    Оставить отзыв
                </div>
                <div class="revieews-form__content">
                    <form enctype="multipart/form-data" method="POST" action="addotziv">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                        <input type="text" placeholder="ФИО" class="form-input" name="userName">
                        <input type="email" placeholder="E-mail" class="form-input" name="email">
                        <input type="text" placeholder="Тема" class="form-input" name="titleReviews">
                        <textarea name="text" id="" class="form-textarea" placeholder="Отзыв"></textarea>
                        <div class="form-attachment">
                            <input type="file" id="attachment" name="file">
                            <label for="attachment" class="file-label"><span>Прикрепить фото</span></label>
                        </div>
                        <input type="submit" class="btn" id = 'reviews' value="Оставить отзыв">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
