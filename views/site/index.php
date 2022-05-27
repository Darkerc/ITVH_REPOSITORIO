<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap4\Carousel;

/** @var yii\web\View $this */

$this->title = 'ITVH Repositorio';
?>
<div class="site-index">
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio institucional del ITVH</h4>
    </div>

    <? echo Carousel::widget([
        'items' => [
            [
                'content' => '<img src="images/blanco.jpg"/>',
                'caption' => '<h4 class="textblack">This is title</h4><p class="textblack">This is the caption text</p>',
            ],
            [
                'content' => '<img src="images/blanco.jpg"/>',
                'caption' => '<h4 class="textblack">This is title</h4><p class="textblack">This is the caption text</p>',
            ],
            [
                'content' => '<img src="images/blanco.jpg"/>',
                'caption' => '<h4 class="textblack">This is title</h4><p class="textblack">This is the caption text</p>',
            ],
        ]
    ]); ?>

    <div class="body-content">
        <div class="row">
            <div class="py-2 col-12 col-lg-7">
                <div class="card my-3">
                    <h4 class="card-header bg-info">Repositorios por carreras</h4>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <p class="card-text">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Ing. Sistemas computacionales
                                <span class="badge badge-primary badge-pill">14</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Ing. Tecnologias de la informacion
                                <span class="badge badge-primary badge-pill">14</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Ing. Gestion empresarial
                                <span class="badge badge-primary badge-pill">14</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Lic. Administracion
                                <span class="badge badge-primary badge-pill">14</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Ing. Civil
                                <span class="badge badge-primary badge-pill">14</span>
                            </a>
                        </div>
                        </p>
                    </div>
                </div>
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
                <div class="card my-3">
                    <h5 class="card-header bg-info">Buscar repositorio por:</h5>
                    <div class="card-body">
                        <p class="card-text">
                        <ol>
                            <li>
                                <a href="/site/search">Autor</a>
                            </li>
                            <li>
                                <a href="/site/search">Titulo</a>
                            </li>
                            <li>
                                <a href="/site/search">Fecha de publicacion</a>
                            </li>
                            <li>
                                <a href="/site/search">Palabras clave</a>
                            </li>
                        </ol>
                        </p>
                    </div>
                </div>
                <div class="card my-3">
                    <h5 class="card-header bg-info">Encuentra en:</h5>
                    <div class="card-body">
                        <p class="card-text">
                        <h6 class="card-title">Autores:</h6>
                        <ol>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Autor</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Titulo</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Fecha de publicacion</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Palabras clave</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                        </ol>
                        </p>
                        <p class="card-text">
                        <h6 class="card-title">Palabras clave:</h6>
                        <ol>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Autor</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Titulo</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Fecha de publicacion</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Palabras clave</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                        </ol>
                        </p>
                        <p class="card-text">
                        <h6 class="card-title">Ultimas fechas:</h6>
                        <ol>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Autor</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Titulo</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Fecha de publicacion</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="/site/search">Palabras clave</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>