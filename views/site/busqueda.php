<?php

use app\widgets\CardSearchPagination;

$this->title = 'ITVH Repositorio - Buscar';
?>
<div class="site-index">
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio Institucional del Tecnológico Nacional de México Campus Villahermosa</h4>
    </div>
    <div class="body-content">
        <div class="row">

            <div class="col-12">
                <?= $this->render('busqueda/_search', ['searchModel' => $searchModel, 'model' => $model]); ?>
            </div>

            <div class="col-12 mt-3">
                <?= CardSearchPagination::widget([
                    "dataProvider" => $dataProvider,
                    'title' => Yii::t('app', 'resultados_busqueda'),
                    "dataProviderResultsMapper" => function ($model) {
                        return [
                            "title" => $model->rec_nombre,
                            "titleChips" => [$model->tipo, $model->nivel],
                            "description" => $model->rec_resumen,
                            "headerRight" => Yii::t('app', 'publicado_el') . ' ' . date_format(new DateTime($model->rec_registro), 'd/m/Y'),
                            "footerRight" => $model->carrera,
                            "footerLeft" => $model->autor,
                            "href" => '/recurso/view?rec_id=' . $model->rec_id . ''
                        ];
                    }
                ]); ?>
            </div>
        </div>
    </div>
</div>