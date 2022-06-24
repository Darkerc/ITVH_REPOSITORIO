<?php

use app\models\Palabra;
use app\widgets\CardListData;
use yii\bootstrap4\Carousel;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Recurso;
use app\models\RecursoArchivo;
use app\models\RecursoCarrera;

$this->title = 'ITVH Repositorio';
?>
<div class="site-index">
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio institucional del ITVH</h4>
    </div>

    <?php
    // echo
    // var_dump($items);
    // die;
    $recurso = ArrayHelper::map(Recurso::find()->orderBy(['rec_id' => SORT_ASC])->all(), 'rec_id', 'rec_nombre');

    ?>

    <?= Carousel::widget(['items' => $recursos]); ?>

    <div class="body-content">
        <div class="row">
            <div class="py-2 col-12 col-lg-7">
                <?= CardListData::widget([
                    'titulo' => 'Repositorio por carreras',
                    'descripcion' => 'Carreras disponibles del instituto tecnologico de villahermosa',
                    'mode' => 'OUTLINED',
                    'data' => RecursoCarrera::getCareersCount(),
                    'dataResultMapper' => function (RecursoCarrera $rCarrera) {
                        return [
                            'href'  => 'site/busqueda',
                            'label' => $rCarrera->carrer,
                            'chip'  => $rCarrera->count
                        ];
                    }
                ]) ?>
            </div>
            <div class="py-2 col-12 col-lg-5">
                <div class="card my-3">
                    <h5 class="card-header bg-info">Buscar repositorios</h5>
                    <div class="card-body">
                        <p class="card-text">
                        <div class="input-group mb-3">
                            <?= Select2::widget([
                                'name' => 'state_10',
                                'data' => $recurso,
                                'options' => [
                                    'placeholder' => 'Busque los repositorios ...',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                                'pluginEvents' => [
                                    "change" => "function(data) { 
                                        const resId = data.target.value
                                        window.location.href = '/recurso/view?rec_id=' + resId;
                                    }",
                                ]
                            ]);
                            ?>
                        </div>
                        </p>
                    </div>
                </div>
                <?= CardListData::widget([
                    'titulo' => 'Repositorios mas vistos',
                    'descripcion' => 'Repositorios con mayor indice de visitas',
                    'mode' => 'OUTLINED',
                    'data' => RecursoArchivo::getMostVisits(),
                    'dataResultMapper' => function (RecursoArchivo $item) {
                        return [
                            'href'  => "/recurso/view?rec_id={$item->recarc_fkrecurso}",
                            'label' => $item->recarcFkrecurso->rec_nombre,
                            'chip'  => $item->visitas
                        ];
                    }
                ]) ?>

                <?= CardListData::widget([
                    'titulo' => 'Repositorios mas descargados',
                    'descripcion' => 'Repositorios con mayor indice de descargas',
                    'mode' => 'OUTLINED',
                    'data' => RecursoArchivo::getMostDownloaded(),
                    'dataResultMapper' => function (RecursoArchivo $item) {
                        return [
                            'href'  => "/recurso/view?rec_id={$item->recarc_fkrecurso}",
                            'label' => $item->recarcFkrecurso->rec_nombre,
                            'chip'  => $item->descargas
                        ];
                    }
                ]) ?>

                <?= CardListData::widget([
                    'titulo' => 'Repositorio por Listado',
                    'mode' => 'TREE',
                    'data' => [
                        [
                            'group' => 'Palabras clave',
                            'items' => Palabra::find()->orderby('RAND()')->limit(4)->all()
                        ]
                    ],
                    'dataResultMapper' => function ($payload) {
                        return [
                            'group' => $payload['group'],
                            'items' => array_map(fn ($item) => ['href'  => 'site/busqueda', 'label' => $item->pal_nombre,], $payload['items']),
                        ];
                    },
                ]) ?>
            </div>
        </div>
    </div>
</div>