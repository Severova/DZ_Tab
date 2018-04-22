<ul class="menu">
    <? foreach ( $items as $item): ?>
        <? $item->render() ?>
    <? endforeach ?>
</ul>
