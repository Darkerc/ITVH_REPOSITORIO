<?php

use yii\grid\ActionColumn;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = $model->rec_id;
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recurso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'rec_id' => $model->rec_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rec_id' => $model->rec_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="site-index">
        <div class="py-3 text-center bg-transparent brand">
            <h4>Recurso</h4>
        </div>

        <div class="body-content">
            <div class="row">
                <div class="col-12 mt-3">
                    <table class="table table-hover">
                        <tr class="tr_item">
                            <td class="td_header">Titulo</td>
                            <td class="td_value">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, possimus debitis. Hic molestias esse suscipit earum eligendi eveniet deserunt, eaque quae asperiores debitis, a totam. Illo quisquam eligendi amet voluptate.</td>
                        </tr>
                        <tr class="tr_item">
                            <td class="td_header">Resumen</td>
                            <td class="td_value">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, possimus debitis. Hic molestias esse suscipit earum eligendi eveniet deserunt, eaque quae asperiores debitis, a totam. Illo quisquam eligendi amet voluptate.</td>
                        </tr>
                        <tr class="tr_item">
                            <td class="td_header">Autor(es)</td>
                            <td class="td_value">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-action">Autor 1</li>
                                    <li class="list-group-item list-group-item-action">Autor 2</li>
                                    <li class="list-group-item list-group-item-action">Autor 3</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="tr_item">
                            <td class="td_header">Carreras</td>
                            <td class="td_value">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-action">Ing. sistemas computacionales</li>
                                    <li class="list-group-item list-group-item-action">Ing. informatica</li>
                                    <li class="list-group-item list-group-item-action">Ing. Tecnologias de la informacion</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="tr_item">
                            <td class="td_header">Carreras</td>
                            <td class="td_value">
                                Licenciatura
                            </td>
                        </tr>
                        <tr class="tr_item">
                            <td class="td_header">Fecha de publicacion</td>
                            <td class="td_value">SOME DATE</td>
                        </tr>
                        <tr class="tr_item">
                            <td class="td_header">URL del recurso</td>
                            <td class="td_value">
                                <a href="https://getbootstrap.com/docs/4.0/content/tables/#hoverable-rows">
                                    https://getbootstrap.com/docs/4.0/content/tables/#hoverable-rows
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <h5 class="card-header bg-info">Archivos del recurso:</h5>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Tamaño</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Visitas</th>
                                        <th scope="col">Descargas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td>@fat</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rec_id',
            'rec_nombre:ntext',
            'rec_resumen:ntext',
            'rec_registro',
            'rec_descripcion:ntext',
            //'rec_fkrecursotipo',
            //'rec_fknivel',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'rec_id' => $model->rec_id]);
                }
            ],
        ],
    ]); ?>


</div>