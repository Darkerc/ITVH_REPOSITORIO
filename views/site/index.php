<?php

use app\widgets\CardListData;
use yii\bootstrap4\Carousel;

$this->title = 'ITVH Repositorio';
?>
<div class="site-index">
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio institucional del ITVH</h4>
    </div>

    <?php echo Carousel::widget([
        'items' => [
            [
                'content' => '<img src="images/blanco.jpg"/>',
                'caption' => '<h4 class="textblack">Índice de Cohesión Organizacional: Propuesta para Evaluar la Guía Corporativa</h4>
                <p class="textblack">De: Roberto Celaya</p>
                <button type="button" class="btn btn-info btn-sm d-inline mx-auto my-2">Ver repositorio</button>',
            ],
            [
                'content' => '<img src="images/blanco.jpg"/>',
                'caption' => '<h4 class="textblack">Índice de Cohesión Organizacional: Propuesta para Evaluar la Comision Corporativa</h4>
                <p class="textblack">De: Roberto Ismael</p>
                <button type="button" class="btn btn-info btn-sm d-inline mx-auto my-2">Ver repositorio</button>',
            ],
            [
                'content' => '<img src="images/blanco.jpg"/>',
                'caption' => '<h4 class="textblack">Compresion Lectora: Propuesta para la promocion de La Lectura a nivel Basico</h4>
                <p class="textblack">De: Carlos reyes</p>
                <button type="button" class="btn btn-info btn-sm d-inline mx-auto my-2">Ver repositorio</button>',
            ],
        ]
    ]); ?>

    <div class="body-content">
        <div class="row">
            <div class="py-2 col-12 col-lg-7">
                <?= CardListData::widget([
                    'titulo' => 'Repositorio por carreras',
                    'descripcion' => 'Carreras disponibles del instituto tecnologico de villahermosa',
                    'mode' => 'OUTLINED',
                    'data' => [
                        [
                            'href' => '#',
                            'label' => 'Ing. Sistemas computacionales',
                            'chip' => 14
                        ],
                        [
                            'href' => '#',
                            'label' => 'Ing. Tecnologias de la informacion',
                            'chip' => 14
                        ],
                        [
                            'href' => '#',
                            'label' => 'Ing. Gestion empresarial',
                            'chip' => 14
                        ],
                        [
                            'href' => '#',
                            'label' => 'Lic. Administracion',
                            'chip' => 14
                        ],
                        [
                            'href' => '#',
                            'label' => 'Ing. Civil',
                            'chip' => 14
                        ],
                    ]
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
                                    <i class="material-icons" style="color: #000 !important;">search</i>
                                </button>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
                <?= CardListData::widget([
                    'titulo' => 'Repositorio por carreras',
                    'mode' => 'DEFAULT',
                    'list_style_type' => 'decimal',
                    'data' => [
                        [
                            'href' => '#',
                            'label' => 'Autor',
                        ],
                        [
                            'href' => '#',
                            'label' => 'Titulo',
                        ],
                        [
                            'href' => '#',
                            'label' => 'Fecha de publicacion',
                        ],
                        [
                            'href' => '#',
                            'label' => 'Palabras clave',
                        ],
                    ]
                ])  ?>
                <?= CardListData::widget([
                    'titulo' => 'Repositorio por carreras',
                    'mode' => 'TREE',
                    'data' => [
                        [
                            'group' => 'Autores',
                            'items' => [
                                [
                                    'label' => 'Autor',
                                    'chip' => 14
                                ],
                                [
                                    'label' => 'Titulo',
                                    'chip' => 14
                                ],
                                [
                                    'label' => 'Fecha de publicacion',
                                    'chip' => 14
                                ],
                                [
                                    'label' => 'Palabras clave',
                                    'chip' => 14
                                ],
                            ],
                        ],
                        [
                            'group' => 'Palabras clave',
                            'items' => [
                                [
                                    'label' => 'INGENIERIA',
                                    'chip' => 14
                                ],
                                [
                                    'label' => 'SISTEMAS',
                                    'chip' => 14
                                ],
                                [
                                    'label' => 'PROGRAMACION',
                                    'chip' => 14
                                ],
                                [
                                    'label' => 'REDES',
                                    'chip' => 14
                                ],
                            ],
                        ],
                        [
                            'group' => 'Ultimas fechas',
                            'items' => [
                                [
                                    'label' => '2022',
                                    'chip' => 14
                                ],
                                [
                                    'label' => '2021',
                                    'chip' => 14
                                ],
                                [
                                    'label' => '2020',
                                    'chip' => 14
                                ],
                                [
                                    'label' => '2019',
                                    'chip' => 14
                                ],
                            ],
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>