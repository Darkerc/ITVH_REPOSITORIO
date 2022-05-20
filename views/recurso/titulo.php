<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Titulo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php Html::a('Create Recurso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="body-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-header bg-info">Busqueda por Titulo</h4>
                    <div class="card-body">
                        <form class="row card-body">
                            <div class="col col-12 col-md-12 form-group">
                                <label>
                                    Ir a:
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        A B C D E F G H I J K L M N O P Q R S T U V W X Y Z
                                    </a>
                                </label>
                            </div>
                            <div class="col col-12 col-md-4 form-group">
                                <label for="exampleInputPassword1">O introducir las primeras letras:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="col col-12 form-group">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="body-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row card-body">
                                    <div class="col col-12 col-md-4 form-group">
                                        <label>Ordenar por:</label>
                                        <select class="custom-select">
                                            <option selected>Titulo</option>
                                            <option value="1">Año de publicacion</option>
                                            <option value="2">Autor</option>
                                            <option value="3">Fecha</option>
                                        </select>
                                    </div>
                                    <div class="col col-12 col-md-4 form-group">
                                        <label for="exampleInputPassword1">En orden:</label>
                                        <select class="custom-select">
                                            <option selected>Ascendente</option>
                                            <option value="1">Descendente</option>
                                        </select>
                                    </div>
                                    <div class="col col-12 col-md-4 form-group">
                                        <label>Resultado por pagina:</label>
                                        <select class="custom-select">
                                            <option selected>5</option>
                                            <option value="1">10</option>
                                            <option value="2">15</option>
                                            <option value="3">20</option>
                                            <option value="4">25</option>
                                            <option value="5">...</option>
                                        </select>
                                    </div>
                                    <div class="col col-12 col-md-4 form-group">
                                        <label for="exampleInputPassword1">Autor/Registro:</label>
                                        <select class="custom-select">
                                            <option selected>Todo</option>
                                            <option value="1">5</option>
                                            <option value="2">10</option>
                                            <option value="3">15</option>
                                            <option value="4">20</option>
                                            <option value="5">...</option>
                                        </select>
                                    </div>
                                    <div class="col col-12">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); 
                    ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'rec_id',
                            'rec_nombre:ntext',
                            'rec_resumen:ntext',
                            'rec_fktipo',
                            'rec_fknivel',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Recurso $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'rec_id' => $model->rec_id]);
                                }
                            ],
                        ],
                    ]); ?>


                </div>