<?php $IS_OUTLINED = $mode != 'OUTLINED' ?>

<div class="card my-3">
    <h4 class="card-header bg-info">
        <?= $titulo ?>
    </h4>
    <div class="card-body">
        <p class="card-text">
            <?= $descripcion ?>
        </p>
        <?php foreach ($data as $group) { ?>
            <p class="card-text">
            <h6 class="card-title">
                <?= $group['group'] ?>
            </h6>
            <ul 
                style="list-style-type: <?= $list_style_type ?>; <?= $IS_OUTLINED ? '' : 'list-style: none;' ?>" 
                class="<?= $IS_OUTLINED ? '' : 'list-group' ?>"
            >
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
    </div>
</div>

<style>
    .list-item-ancla {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>