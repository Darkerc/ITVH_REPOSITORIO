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
                            <?= $item['title'] ?> 
                            <?php foreach ($item['titleChips'] as $chip) {  ?>
                                - <span class="badge badge-info"><?= $chip ?></span>
                            <?php } ?>
                        </h5>
                        <span>
                            <small class="badge badge-info">
                                <?= $item['headerRight'] ?>
                            </small>
                        </span>
                    </div>
                    <p class="mb-1" style="max-height: 200px; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden;">
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
                            <?= Yii::t('app', 'card_search_pagination_ver_repositorio') ?>
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