<?php
use yii\bootstrap4\LinkPager;
?>

<div class="card">
    <h4 class="card-header bg-info">
        <?= $this->context->title ?>
    </h4>
    <div class="card-body p-0">
        <div class="list-group">
            <?php foreach ($this->context->items as $item) { ?>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between mb-3">
                        <h5 class="mb-1">
                            <?= $item['title'] ?> - <span class="badge badge-info"><?= $item['titleChip'] ?></span>
                        </h5>
                        <span>
                            <small class="badge badge-info">
                                <?= $item['headerRight'] ?>
                            </small>
                        </span>
                    </div>
                    <p class="mb-1">
                        <?= $item['description'] ?>
                    </p>
                    <div class="d-flex justify-content-between py-2">
                        <span class='badge badge-info'>
                            <?= $item['footerLeft'] ?>
                        </span>

                        <span class="badge badge-info">
                            <?= $item['footerRight'] ?>
                        </span>
                    </div>
                    <div class="d-flex justify-content-end py-2">
                        <a class="btn btn-success btn-sm" href="<?= $item['href'] ?>">
                            Ver repositorio
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="card-footer text-muted p-0 d-flex justify-content-center">
        <span class="pt-3">
            <?= LinkPager::widget(['pagination' => $this->context->dataProvider->pagination]) ?>
        </span>
    </div>
</div>