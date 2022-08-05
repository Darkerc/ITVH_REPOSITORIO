<?php

use app\widgets\CardContainer;

$IS_OUTLINED = $mode != 'OUTLINED'
?>

<?php CardContainer::begin(['title' => $titulo, 'color' => $color]); ?>
<p class="card-text">
    <?= $descripcion ?>
</p>
<?php foreach ($data as $group) { ?>
    <p class="card-text">
    <h6 class="card-title">
        <?= $group['group'] ?>
    </h6>
    <ul style="list-style-type: <?= $list_style_type ?>; <?= $IS_OUTLINED ? '' : 'list-style: none;' ?>" class="<?= $IS_OUTLINED ? '' : 'list-group' ?>">
        <?php foreach ($group['items'] as $item) { ?>
            <li>
                <a href="<?= $item['href'] ?>" class="list-item-ancla <?= $IS_OUTLINED ? '' : 'list-group-item list-group-item-action' ?>">
                    <?= $item['label'] ?>
                    <?php if ($item['chip']) { ?>
                        <span class="badge badge-primary badge-pill">
                            <?= $item['chip'] ?>
                        </span>
                    <?php } ?>
                </a>
            </li>
        <?php } ?>
    </ul>
    </p>
<?php } ?>
<?php CardContainer::end(); ?>

<style>
    .list-item-ancla {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>