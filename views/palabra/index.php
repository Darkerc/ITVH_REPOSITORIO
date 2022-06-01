<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PalabraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Palabras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="palabra-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Palabra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pal_id',
            'pal_nombre:ntext',
            'pal_fkrecurso',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pal_id' => $model->pal_id]);
                 }
            ],
        ],
    ]); ?>


</div>
