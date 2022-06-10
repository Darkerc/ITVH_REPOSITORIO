<?php
use app\widgets\CardSearchPagination;
$this->title = 'ITVH Repositorio - Buscar';
?>
<div class="site-index">
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio institucional del ITVH</h4>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-header bg-info">Buscando por...</h4>
                    <div class="card-body">
                        <?= $this->render('busqueda/_search', ['model' => $searchModel]); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
            <?= CardSearchPagination::widget([
                "dataProvider" => $dataProvider,
                "dataProviderResultsMapper" => function ($model) {
                    return [
                        "title" => $model['rec_nombre'],
                        "description" => $model['rec_resumen'],
                        "time" => $model['rec_registro'],
                        "type" => $model['tipo'],
                        "href" => '#',
                        "footerRight" => $model['carrera'],
                        "footerLeft" => $model['autor'],
                    ];
                }
            ]); ?>
            </div>
        </div>
    </div>
</div>