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
                        "titleChip" => $model['tipo'],
                        "description" => $model['rec_resumen'],
                        "headerRight" => "Publicado en: " . date_format(new DateTime($model['rec_registro']), 'd/m/Y'),
                        "footerRight" => $model['carrera'],
                        "footerLeft" => end($model['autor']),
                        // "footerLeft" => array_map(fn($autor) => $autor, $model['autor']),
                        "href" => '/recurso/view?rec_id=' . $model->rec_id . ''
                    ];
                }
            ]); ?>
            </div>
        </div>
    </div>
</div>