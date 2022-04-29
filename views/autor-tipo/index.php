<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutorTipoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autor Tipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autor-tipo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Autor Tipo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'autt_id',
            'autt_nombre:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AutorTipo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'autt_id' => $model->autt_id]);
                 }
            ],
        ],
    ]); ?>


</div>
