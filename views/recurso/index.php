<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\widgets\CardSearchPagination;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recurso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= CardSearchPagination::widget([
        "dataProvider" => $dataProvider,
        "dataProviderResultsMapper" => function ($model) {
            return [
                "title" => $model['rec_nombre'],
                "description" => $model['rec_resumen'],
                "time" => $model['rec_registro'],
                "type" => $model['tipo'],
            ];
        }
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rec_id',
            'rec_nombre:ntext',
            'rec_resumen:ntext',
            'rec_registro',
            //'rec_descripcion:ntext',
            'tipo',
            'nivel',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'rec_id' => $model->rec_id]);
                }
            ],
        ],
    ]);  ?>
</div>