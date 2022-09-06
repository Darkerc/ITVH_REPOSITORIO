<?php

// echo
// var_dump($model);
// die;
/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Archivo;
use kartik\grid\GridView;
use app\models\RecursoArchivo;
use yii\data\ArrayDataProvider;
use kartik\icons\FontAwesomeAsset;
use webvimark\modules\UserManagement\models\User;
use app\widgets\TableViewer;

FontAwesomeAsset::register($this);

$archivos = new ArrayDataProvider([
    'allModels' => array_map(fn (RecursoArchivo $modelRA) => $modelRA->recarcFkarchivo, $model->recursoArchivos),
]);
?>

<div class="site-index">
    <div class="body-content">
        <div class="row mb-3">
            <div class="col-12 mt-3">
                <?= TableViewer::widget([
                    'data' => [
                        [
                            'header' => '',
                            'values' => 
                            Html::tag('div', 
                                Html::a('Descargar JSON <img src="/images/download.svg" />', "/recurso/download-dublin-file?type=json&rec_id=$model->rec_id", ['title' => 'Descargar JSON' ,'class' => 'mx-3 kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary']) .
                                Html::a('Descargar XML <img src="/images/download.svg" />', "/recurso/download-dublin-file?type=xml&rec_id=$model->rec_id", ['title' => 'Descargar XML' ,'class' => 'mx-3 kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary']) .
                                Html::a('Descargar CSV <img src="/images/download.svg" />', "/recurso/download-dublin-file?type=csv&rec_id=$model->rec_id", ['title' => 'Descargar CSV' ,'class' => 'mx-3 kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary']) 
                            , ['class' => 'd-flex justify-content-end'])
                        ],
                        [
                            'header' => 'Título',
                            'values' => $model->rec_nombre
                        ],
                        [
                            'header' => 'Resumen',
                            'values' => $model->rec_resumen
                        ],
                        [
                            'header' => 'Autor(es)',
                            'values' => array_map(fn ($rAutor) => $rAutor->autor, $model->autorRecursos)
                        ],
                        [
                            'header' => 'Carreras',
                            'values' => array_map(fn ($rCarrera) => $rCarrera->carrera, $model->recursoCarreras)
                        ],
                        [
                            'header' => 'Nivel',
                            'values' => $model->nivel
                        ],
                        [
                            'header' => 'Tipo',
                            'values' => $model->tipo
                        ],
                        [
                            'header' => 'Fecha de publicación',
                            'values' => date_format(new DateTime($model->rec_registro), 'd/m/Y')
                        ],
                        [
                            'header' => 'URL del recurso',
                            'values' => Html::a($model->currentUrl, $model->currentUrl)
                        ],
                        [
                            'header' => 'Palabras Clave',
                            'values' => array_map(fn ($rPalabra) => $rPalabra->pal_nombre, $model->palabras)
                        ],
                        [
                            'header' => 'Cambios',
                            'values' => $model->rec_descripcion,
                            'hide' => !User::hasRole(['admon', false])
                        ],
                    ]
                ]) ?>
            </div>


            <div style="width: 100%;">
                <?=
                GridView::widget([
                    'dataProvider' => $archivos,
                    'columns' => [
                        'arc_nombre',
                        'arc_extension',
                        'arc_visitas',
                        'arc_descargas',
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'header' => ' ',
                            'template' => '{btnView}{btnDownload}',
                            'buttons' => [
                                'btnView' => function ($url, Archivo $archivo, $key) {     // render your custom button
                                    // "/archivo/file-view?arc_id={$archivo->arc_id}"
                                    return Html::a('<img src="/images/view.svg" />', "/archivo/file-view?arc_id={$archivo->arc_id}", [
                                        'class' => 'kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary',
                                        'title' => 'Ver',
                                        'id' => $archivo->arc_id
                                    ]);
                                },
                                'btnDownload' => function ($url, Archivo $archivo, $key) {     // render your custom button
                                    return Html::a('<img src="/images/download.svg" />', "/archivo/file-download?arc_id={$archivo->arc_id}", [
                                        'class' => 'kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary',
                                        'title' => 'Descargar',
                                    ]);
                                }
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>