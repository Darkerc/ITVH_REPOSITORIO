<?php

// echo
// var_dump($model);
// die;
/** @var yii\web\View $this */

use app\models\Archivo;
use app\models\RecursoArchivo;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use webvimark\modules\UserManagement\models\User;

use kartik\icons\FontAwesomeAsset;

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

            <div style="width: 100%;">
                <?=
                GridView::widget([
                    'dataProvider' => $archivos,
                    'options' => [
                        'class' => 'success',
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'arc_nombre',
                        'arc_extension',
                        'arc_visitas',
                        'arc_descargas',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{myButton}',
                            'buttons' => [
                                'myButton' => function ($url, $archivo, $key) {     // render your custom button
                                    // return Html::a('<i class="bi-zoom-in"></i>', [$archivo->getArchivoURL()], ['class' => 'kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary']);
                                    return <<<EOD
  
                                    EOD;
                                }
                            ]
                            // 'value' => function (Archivo $archivo) {
                            //     return Html::a('Ver', [$archivo->getArchivoURL()], ['class' => 'btn']);
                            //  }
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>