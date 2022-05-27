<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursoTipoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recurso Tipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-tipo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recurso Tipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rectip_id',
            'rectip_nombre:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RecursoTipo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'rectip_id' => $model->rectip_id]);
                 }
            ],
        ],
    ]); ?>


</div>
