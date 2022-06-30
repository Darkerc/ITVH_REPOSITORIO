<?php

// echo
// var_dump($model);
// die;
/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Archivo;
use kartik\grid\GridView;
use yii\bootstrap4\Modal;
use app\models\RecursoArchivo;
use yii\data\ArrayDataProvider;
use kartik\icons\FontAwesomeAsset;
use webvimark\modules\UserManagement\models\User;


FontAwesomeAsset::register($this);

$archivos = new ArrayDataProvider([
    'allModels' => array_map(fn (RecursoArchivo $modelRA) => $modelRA->recarcFkarchivo, $model->recursoArchivos),
]);
?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-12 mt-3">
                <table class="table table-hover">
                    <tr class="tr_item">
                        <td class="td_header">Titulo</td>
                        <td class="td_value"><?= $model->rec_nombre ?></td>
                    </tr>
                    <tr class="tr_item">
                        <td class="td_header">Resumen</td>
                        <td class="td_value"><?= $model->rec_resumen ?></td>
                    </tr>
                    <tr class="tr_item">
                        <td class="td_header">Autor(es)</td>
                        <td class="td_value">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action">
                                    <?= $model->autor ?>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="tr_item">
                        <td class="td_header">Carreras</td>
                        <td class="td_value">
                            <?php
                            if (count($model->recursoCarreras) > 0) {
                            ?>
                                <?php foreach ($model->recursoCarreras as $rCarrera) { ?>
                                    <li class="list-group-item list-group-item-action">
                                        <?= $rCarrera->carrera ?>
                                    </li>
                                <?php } ?>
                            <?php
                            } else {
                            ?>
                                <li class="list-group-item list-group-item-action">
                                    Sin carreras
                                </li>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr class="tr_item">
                        <td class="td_header">Nivel</td>
                        <td class="td_value">
                            <?= $model->nivel ?>
                        </td>
                    </tr>
                    <tr class="tr_item">
                        <td class="td_header">Tipo</td>
                        <td class="td_value">
                            <?= $model->tipo ?>
                        </td>
                    </tr>
                    <tr class="tr_item">
                        <td class="td_header">Fecha de publicacion</td>
                        <td class="td_value"><?= date_format(new DateTime($model->rec_registro), 'd/m/Y') ?></td>
                    </tr>
                    <tr class="tr_item">
                        <td class="td_header">URL del recurso</td>
                        <td class="td_value">
                            <a href="<?= $model->currentUrl ?>">
                                <?= $model->currentUrl ?>
                            </a>
                        </td>
                    </tr>
                    <tr class="tr_item">
                        <td class="td_header">Palabras Clave</td>
                        <td class="td_value">
                            <?php
                            if (count($model->palabras) > 0) {
                            ?>
                                <?php foreach ($model->palabras as $rPalabra) { ?>
                                    <li class="list-group-item list-group-item-action">
                                        <?= $rPalabra->pal_nombre ?>
                                    </li>
                                <?php } ?>
                            <?php
                            } else {
                            ?>
                                <li class="list-group-item list-group-item-action">
                                    Sin Palabras Clave
                                </li>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php if (User::hasRole(['admon', false])) { ?>
                        <?php if (isset($model->rec_descripcion)) { ?>
                            <tr class="tr_item">
                                <td class="td_header">Cambios</td>
                                <td class="td_value"><?= $model->rec_descripcion ?></td>
                            </tr>
                        <?php } else { ?>
                            <tr class="tr_item">
                                <td class="td_header">Cambios</td>
                                <td class="td_value">
                                    <h4>SIN CAMBIOS</h4>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>

            <?php Modal::begin([
                'title' => '<h2>Hello world</h2>',
                'toggleButton' => ['label' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
              </svg>'],
                'bodyOptions' => ['class' => 'kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary']
            ]);

            echo 'Say hello...';

            Modal::end();
            ?>

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
                            'template' => '{myButtonview}{myButton}',
                            'buttons' => [
                                'myButton' => function ($url, $archivo, $key) {     // render your custom button
                                    return Html::a('<img src="/images/view.svg" />', $archivo->getArchivoURL(), ['class' => 'kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary', 'title' => 'Ver']);
                                },
                                'myButtonview' => function ($url, $archivo, $key) {     // render your custom button
                                    return Html::a('<img src="/images/download.svg" />', $archivo->getArchivoURL(), ['class' => 'kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary', 'title' => 'Descargar']);
                                }
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>