<?php

/** @var yii\web\View $this */

$this->title = 'ITVH Repositorio';
?>
<div class="site-index">
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio institucional del ITVH</h4>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-12">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title text-center">Repositorios recientes</h5>
                        <div id="carouselExampleControls" class="carousel slide carousel-dark" data-ride="carousel" style="height: 200px;">
                            <ol class="carousel-indicators">
                                <li style="background-color: #888;" data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                                <li style="background-color: #888;" data-target="#carouselExampleControls" data-slide-to="1"></li>
                                <li style="background-color: #888;" data-target="#carouselExampleControls" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="my-1 text-center">
                                            Índice de Cohesión Organizacional: Propuesta para Evaluar la Guía Corporativa
                                        </h5>
                                        <div class="text-center my-2">
                                            De: Roberto Celaya
                                        </div>
                                        <button type="button" class="btn btn-info btn-sm d-inline mx-auto my-2">Ver repositorio</button>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="my-1 text-center">
                                            Índice de Cohesión Organizacional: Propuesta para Evaluar la Guía Corporativa
                                        </h5>
                                        <div class="text-center my-2">
                                            De: Roberto Celaya
                                        </div>
                                        <button type="button" class="btn btn-info btn-sm d-inline mx-auto my-2">Ver repositorio</button>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="my-1 text-center">
                                            Índice de Cohesión Organizacional: Propuesta para Evaluar la Guía Corporativa
                                        </h5>
                                        <div class="text-center my-2">
                                            De: Roberto Celaya
                                        </div>
                                        <button type="button" class="btn btn-info btn-sm d-inline mx-auto my-2">Ver repositorio</button>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <i class="material-icons" style="color: #000 !important;">arrow_back_ios</i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <i class="material-icons" style="color: #000 !important;">arrow_forward_ios</i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
                                <a href="#">Autor</a>
                            </li>
                            <li>
                                <a href="#">Titulo</a>
                            </li>
                            <li>
                                <a href="#">Fecha de publicacion</a>
                            </li>
                            <li>
                                <a href="#">Palabras clave</a>
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
                                <a href="#">Autor</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Titulo</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Fecha de publicacion</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Palabras clave</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                        </ol>
                        </p>
                        <p class="card-text">
                        <h6 class="card-title">Palabras clave:</h6>
                        <ol>
                            <li class="d-flex justify-content-between">
                                <a href="#">Autor</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Titulo</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Fecha de publicacion</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Palabras clave</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                        </ol>
                        </p>
                        <p class="card-text">
                        <h6 class="card-title">Ultimas fechas:</h6>
                        <ol>
                            <li class="d-flex justify-content-between">
                                <a href="#">Autor</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Titulo</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Fecha de publicacion</a>
                                <span class="badge badge-info my-auto">4</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <a href="#">Palabras clave</a>
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