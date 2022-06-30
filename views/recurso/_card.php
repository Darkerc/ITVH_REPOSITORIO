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
                        <td class="td_header">URL del recurso</td>
                        <td class="td_value">
                            <a href="<?= $imagick ?>">
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

            <?php

                // $im = new Imagick();

                // $im->setResolution(100,100);
                // $im->readimage('/home/darkerc/Escritorio/repositorio/web/files/test.pdf[0]'); 
                // $im->setImageFormat('jpg');    
                // $im->writeImage('thumb.jpg');
                // echo '<img src="data:image/jpg;base64,'.base64_encode($im->getImageBlob()).'" alt="" />';
                // $im->clear(); 
                // $im->destroy();

                $blobs = $model->recursoArchivos[0]->recarcFkarchivo->getBlobFiles();
                for ($i=0; $i < count($blobs); $i++) { 
                    echo '<img src="data:image/jpg;base64,'.$blobs[$i].'" alt="" />';
                }

                // $image = file_get_contents('/home/darkerc/Escritorio/repositorio/web/files/test.pdf');
                // echo '<pre>';
                // echo var_dump($image);
                // echo '</pre>';

                // $imagick = new Imagick();
                // $imagick->readImage($image);
                // $imagick->setResolution(150, 150);
                // $imagick->destroy();

                // $imagick->read('http://localhost:8080/files/2022-Recurso%20con%20archivos-1141.pdf');
                // $imagick->writeImages('myimage.jpg', false);
            ?>

            <div style="width: 100%;">
                <?php
                $this->registerJs("$(function() {
                    $('#popupModal').click(function(e) {
                      e.preventDefault();
                      $('#modal').modal('show').find('.modal-content')
                      .load($(this).attr('href'));
                    });
                 });");

                Modal::begin([
                    'id' => 'modal',
                    'title' => '<h2>' . $model->rec_nombre . '</h2>',
                ]);
                echo '<pre>';
                var_dump($model->rec_resumen);
                echo '<pre>';
                Modal::end();
                ?>
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
                                'myButtonview' => function ($url, $archivo, $key) {     // render your custom button
                                    return Html::a('<img src="/images/view.svg" />', ['href' => ''], ['class' => 'kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary', 'title' => 'Ver', 'id' => 'popupModal']);
                                },
                                'myButton' => function ($url, $archivo, $key) {     // render your custom button
                                    return Html::a('<img src="/images/download.svg" />', $archivo->getArchivoURL(), ['class' => 'kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary', 'title' => 'Descargar']);
                                }
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>