<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archivo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'arc_id',
            'arc_nombre:ntext',
            'arc_extension:ntext',
            'arc_original:ntext',
            'arc_visitas',
            //'arc_descargas',
            //'arc_mimetype:ntext',
            //'arc_fecha',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Archivo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'arc_id' => $model->arc_id]);
                 }
            ],
        ],
    ]); ?>


</div>
