<?php

use app\widgets\CardListData;
use yii\bootstrap4\Carousel;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Recurso;

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
                    'data' => $carreras
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
                                        // const resName = data.target.options[data.target.selectedIndex].text
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
                    'titulo' => 'Repositorio por Listado',
                    'mode' => 'DEFAULT',
                    'list_style_type' => 'decimal',
                    'data' => [
                        [
                            'href'  => 'site/busqueda',
                            'label' => 'Autor',
                        ],
                        [
                            'href'  => 'site/busqueda',
                            'label' => 'Titulo',
                        ],
                        [
                            'href'  => 'site/busqueda',
                            'label' => 'Fecha de publicacion',
                        ],
                        [
                            'href'  => 'site/busqueda',
                            'label' => 'Palabras clave',
                        ],
                    ]
                ])  ?>
                <?= CardListData::widget([
                    'titulo' => 'Repositorio por Listado',
                    'mode' => 'TREE',
                    'data' => [
                        [
                            'group' => 'Autores',
                            'items' => [
                                [
                                    'href'  => 'site/busqueda',
                                    'label' => 'Autor',
                                ],
                                [
                                    'href'  => 'site/busqueda',
                                    'label' => 'Titulo',
                                ],
                                [
                                    'href'  => 'site/busqueda',
                                    'label' => 'Fecha de publicacion',
                                ],
                                [
                                    'href'  => 'site/busqueda',
                                    'label' => 'Palabras clave',
                                ],
                            ],
                        ],
                        [
                            'group' => 'Palabras clave',
                            'items' => $palabras,
                        ],
                        [
                            'group' => 'Ultimas fechas',
                            'items' => [
                                [
                                    'href'  => 'site/busqueda',
                                    'label' => '2022',
                                ],
                                [
                                    'href'  => 'site/busqueda',
                                    'label' => '2021',
                                ],
                                [
                                    'href'  => 'site/busqueda',
                                    'label' => '2020',
                                ],
                                [
                                    'href'  => 'site/busqueda',
                                    'label' => '2019',
                                ],
                            ],
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>