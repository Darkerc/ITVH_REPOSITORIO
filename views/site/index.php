<?php

use app\models\Palabra;
use app\widgets\CardListData;
use app\widgets\CardContainer;
use yii\bootstrap4\Carousel;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Recurso;
use app\models\RecursoArchivo;
use app\models\RecursoCarrera;
use yii\helpers\Html;
use app\models\Visitas;
$this->title = 'ITVH Repositorio';
?>
<div class="site-index ">
    <div class="py-1 bg-transparent brand d-flex justify-content-end">
        <h5 class="textcount">
        NÚMERO DE VISITAS: <?= Visitas::getCount() ?>
        </h5>
    </div>
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio Institucional del Tecnológico Nacional de México Campus Villahermosa</h4>
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
                    'descripcion' => 'Carreras disponibles en el Campus Villahermosa',
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
                <?= CardListData::widget([
                    'titulo' => 'Repositorio Por Listado de Palabras Clave',
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
                            'items' => array_map(fn ($item) => ['href'  => 'site/busqueda', 'label' => $item->pal_nombre], $payload['items']),
                        ];
                    },
                ]) ?>
            </div>
            <div class="py-2 col-12 col-lg-5">
                <?php CardContainer::begin([ 'title' => 'Buscar repositorio', 'color' => '#4CD64C' ]); ?>
                    <p class="card-text">
                        <label>Por Nombre:</label>
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
                    <p>
                        <?= Html::a('Búsqueda Avanzada', 'site/busqueda', ['class' => 'btn textwhite', 'style' => 'width:100%; background:#4CD64C; ']) ?>
                    </p>
                <?php CardContainer::end(); ?>

                <?= CardListData::widget([
                    'titulo' => 'Repositorios más vistos',
                    'descripcion' => 'Repositorios con mayor índice de visitas',
                    'mode' => 'OUTLINED',
                    'color' => '#4CD64C',
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
                    'titulo' => 'Repositorios más descargados',
                    'descripcion' => 'Repositorios con mayor índice de descargas',
                    'mode' => 'OUTLINED',
                    'color' => '#4CD64C',
                    'data' => RecursoArchivo::getMostDownloaded(),
                    'dataResultMapper' => function (RecursoArchivo $item) {
                        return [
                            'href'  => "/recurso/view?rec_id={$item->recarc_fkrecurso}",
                            'label' => $item->recarcFkrecurso->rec_nombre,
                            'chip'  => $item->descargas
                        ];
                    }
                ]) ?>
            </div>
        </div>
    </div>
</div>