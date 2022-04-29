<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EncargadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encargados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encargado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Encargado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'enc_id',
            'enc_nombre:ntext',
            'enc_apellidoMaterno:ntext',
            'enc_apellidoPaterno:ntext',
            'enc_fkdepartamento',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Encargado $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'enc_id' => $model->enc_id]);
                 }
            ],
        ],
    ]); ?>


</div>
