<?php

use app\widgets\CardListData;
use yii\bootstrap4\Carousel;

$this->title = 'ITVH Repositorio';
?>
<div class="site-index">
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio institucional del ITVH</h4>
    </div>

    <?
    // echo
    // var_dump($items);
    // die;
    ?>

    <?= Carousel::widget(['items' => $items]); ?>

    <div class="body-content">
        <div class="row">
            <div class="py-2 col-12 col-lg-7">
                <?= CardListData::widget([
                    'titulo' => 'Repositorio por carreras',
                    'descripcion' => 'Carreras disponibles del instituto tecnologico de villahermosa',
                    'mode' => 'OUTLINED',
                    'data' => $data
                ]) ?>
            </div>
            <div class="py-2 col-12 col-lg-5">
                <div class="card my-3">
                    <h5 class="card-header bg-info">Buscar repositorios</h5>
                    <div class="card-body">
                        <p class="card-text">
                        <div class="input-group mb-3">
                            <input placeholder="Repositorio..." type="text" class="form-control d-block" style="min-height: 100% !important;">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary  btn-sm" type="button">
                                    <i class="material-icons" style="color: site/busqueda000 !important;">search</i>
                                </button>
                            </div>
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
                            'items' => $data1,
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