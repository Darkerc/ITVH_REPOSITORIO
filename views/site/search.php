<?php

use yii\grid\GridView;

$this->title = 'ITVH Repositorio - Buscar';
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
                        <form class="row card-body">
                            <div class="col col-12 form-group">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        [
                                            'label' => 'First Name',
                                            'attribute' => 'firstname',
                                        ],
                                        [
                                            'label' => 'Last Name',
                                            'attribute' => 'lastname',
                                        ],
                                        //  'company',
                                        // 'address:ntext',
                                        // 'phone',
                                        // 'mobile',
                                        // 'fax',
                                        //Following is the related column from the groups table
                                        [
                                            'label' => 'Groups',
                                            'format' => 'ntext',
                                            'attribute' => 'groupname',
                                            'value' => function ($model) {
                                                foreach ($model->groups as $group) {
                                                    $groupNames[] = $group->groupname;
                                                }
                                                return implode("\n", $groupNames);
                                            },
                                        ],
                                        [
                                            'label' => 'Primary Email',
                                            'attribute' => 'pemail',
                                        ],
                                        // 'semail:email',
                                        // 'country',
                                        // 'websiteurl:url',
                                        // 'gender',
                                        // 'birthday',
                                        // 'status',
                                        // 'sentstatus',
                                        // 'addeddate',
                                        // 'updateddate',
                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]);
                                ?>
                                <label for="exampleInputEmail1">Nombre del repositorio:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Repositorio...">
                            </div>
                            <div class="col col-12 col-md-6 form-group">
                                <label for="exampleInputPassword1">Carreras</label>
                                <select class="custom-select">
                                    <option selected>Seleccione una carrera</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col col-12 col-md-6 form-group">
                                <label for="exampleInputPassword1">Autor</label>
                                <select class="custom-select">
                                    <option selected>Seleccione un autor</option>
                                    <option value="1">Autor 1</option>
                                    <option value="2">Autor 2</option>
                                    <option value="3">Autor 3</option>
                                </select>
                            </div>
                            <div class="col col-12">
                                <h6 class="card-title">Fecha de publicacion</h6>
                                <div class="row">
                                    <div class="col col-12 col-md-6 form-group">
                                        <label>Desde:</label>
                                        <input type="date" class="form-control" placeholder="Repositorio...">
                                    </div>
                                    <div class="col col-12 col-md-6 form-group">
                                        <label>Hasta:</label>
                                        <input type="date" class="form-control" placeholder="Repositorio...">
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <h4 class="card-header bg-info">Resultados de busqueda</h4>
                    <div class="card-body p-0">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small>3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small>Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">List group item heading</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
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