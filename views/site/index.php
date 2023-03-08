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
$recursosRecomendados = Recurso::suggestRecursosByUserId(Yii::$app->user->id);

?>
<div class="site-index ">
    <div class="py-1 bg-transparent brand d-flex justify-content-end">
        <h5 class="textcount">
        <?= Yii::t('app', 'numero_visitas') ?> : <?= Visitas::getCount() ?>
        </h5>
    </div>
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio Institucional del Tecnológico Nacional de México Campus Villahermosa</h4>
    </div>

    <?php
    $recurso = ArrayHelper::map(Recurso::find()->orderBy(['rec_id' => SORT_ASC])->all(), 'rec_id', 'rec_nombre');
    ?>

    <?= Carousel::widget(['items' => $recursos]); ?>

    <div class="body-content">
        <div class="row">
            <div class="py-2 col-12 col-lg-7">
                <?= CardListData::widget([
                    'titulo' => Yii::t('app', 'repositorio_por_carreras'),
                    'descripcion' => Yii::t('app', 'carreras_disponibles_en_el_campus_villahermosa'),
                    'mode' => 'OUTLINED',
                    'data' => RecursoCarrera::getCareersCount(),
                    'dataResultMapper' => function (RecursoCarrera $rCarrera) {
                        return [
                            'href'  => "/site/busqueda?RecursoSearch%5Brec_nombre%5D=&RecursoSearch%5Brec_fkrecursotipo%5D=&RecursoSearch%5Brec_fknivel%5D=&RecursoSearch%5BrecursoCarrera%5D=&RecursoSearch%5BrecursoCarrera%5D%5B%5D={$rCarrera->car_id}&RecursoSearch%5Bpalabrasc%5D=&RecursoSearch%5Brec_registro%5D=",
                            'label' => $rCarrera->carrer,
                            'chip'  => $rCarrera->count
                        ];
                    }
                ]) ?>
                <?= CardListData::widget([
                    'titulo' => Yii::t('app', 'repositorio_listado_palabras_clave'),
                    'mode' => 'TREE',
                    'data' => [
                        [
                            'group' => Yii::t('app', 'palabra_clave'),
                            'items' => Palabra::find()->orderby('RAND()')->limit(4)->all()
                        ]
                    ],
                    'dataResultMapper' => function ($payload) {
                        return [
                            'group' => $payload['group'],
                            'items' => array_map(fn ($item) => ['href'  => "/site/busqueda?RecursoSearch%5Brec_nombre%5D=&RecursoSearch%5Brec_fkrecursotipo%5D=&RecursoSearch%5Brec_fknivel%5D=&RecursoSearch%5BrecursoCarrera%5D=&RecursoSearch%5Bpalabrasc%5D=&RecursoSearch%5Bpalabrasc%5D%5B%5D={$item->pal_nombre}&RecursoSearch%5Brec_registro%5D=", 'label' => $item->pal_nombre], $payload['items']),
                        ];
                    },
                ]) ?>
                <?php if (!is_null($recursosRecomendados) && count($recursosRecomendados) > 0) { ?>
                <?= CardListData::widget([
                    'titulo' => Yii::t('app', 'repositorio_listado_recomendados'),
                    'descripcion' => Yii::t('app', 'repositorio_listado_recomendados_descripcion'),
                    'mode' => 'OUTLINED',
                    'data' => $recursosRecomendados,
                    'dataResultMapper' => function (Recurso $recurso) {
                        return [
                            'href'  => "/recurso/view?rec_id={$recurso->rec_id}",
                            'label' => $recurso->rec_nombre                        
                        ];
                    },
                ]) ?>
                <?php } ?>  
            </div>
            <div class="py-2 col-12 col-lg-5">
                <?php CardContainer::begin([ 'title' => Yii::t('app', 'buscar_repositorio'), 'color' => '#4CD64C' ]); ?>
                    <p class="card-text">
                        <label><?= Yii::t('app', 'nombre') ?></label>
                    <div class="input-group mb-3">
                        <?= Select2::widget([
                            'name' => 'state_10',
                            'data' => $recurso,
                            'options' => [
                                'placeholder' => Yii::t('app', 'busque_repositorio'),
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
                        <?= Html::a(Yii::t('app', 'busqueda_avanzada'), 'site/busqueda', ['class' => 'btn textwhite', 'style' => 'width:100%; background:#4CD64C; ']) ?>
                    </p>
                <?php CardContainer::end(); ?>

                <?= CardListData::widget([
                    'titulo' => Yii::t('app', 'repositorios_mas_vistos'),
                    'descripcion' =>  Yii::t('app', 'repositorio_mayor_visitas'),
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
                    'titulo' => Yii::t('app', 'repositorios_mas_descargados'),
                    'descripcion' => Yii::t('app', 'repositorios_mayor_descargas'),
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