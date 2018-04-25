<div class="col-md-3">
    <div class="quick-reservation__left">
        <div class="quick-reservation__title">
            <h2>Быстрое бронирование:</h2>
        </div>
        <div class="quick-reservation__form">

            <input type="date" class="form-input lease_start" placeholder="Начало аренды">
            <input type="date" class="form-input lease_ending" placeholder="Окончание аренды">
            <select name="" id="select">

                <option value="0">Все марки</option><!--TODO цикл-->


                <option value="1"><?= $brand ?></option>


            </select>
        </div>
    </div>
</div>