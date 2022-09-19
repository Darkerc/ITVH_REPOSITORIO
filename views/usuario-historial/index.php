<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioHistorialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Historials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-historial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usuario Historial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usuhis_id',
            'usuhis_fecha',
            'fk_user',
            'fk_recurso',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UsuarioHistorial $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'usuhis_id' => $model->usuhis_id]);
                 }
            ],
        ],
    ]); ?>


</div>
