<?php


$this->title = 'ITVH Repositorio - Buscar';
$results = $dataProvider->getModels();
?>
<div class="site-index">
    <div class="py-3 text-center bg-transparent brand">
        <h4>Repositorio institucional del ITVH</h4>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-header bg-info">Buscando por...</h4>
                    <div class="card-body">
                        <?= $this->render('busqueda/_search', ['model' => $searchModel]); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <h4 class="card-header bg-info">Resultados de busqueda</h4>
                    <div class="card-body p-0">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between mb-3">
                                    <h5 class="mb-1">
                                        El Libro del Principito - <span class="badge badge-info">Tesis</span>
                                    </h5>
                                    <span>
                                        <small class="badge badge-info">3 days ago</small>
                                    </span>
                                </div>
                                <p class="mb-1">
                                    El principito es una narración corta del escritor francés Antoine de Saint-Exupéry, que trata de la historia de un pequeño príncipe que parte de su asteroide a una travesía por el universo, en la cual
                                </p>
                                <div class="d-flex justify-content-between">
                                    <small>De: Roberto Celaya</small>
                                    <small>Ing. Sistemas computacionales</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-muted p-0">
                        <ul class="pagination justify-content-center my-2">
                            <li class="page-item">
                                <span class="page-link">Anterior</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <span class="page-link">
                                    2
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>