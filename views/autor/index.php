<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Autor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'aut_id',
            'aut_nombre:ntext',
            'aut_paterno:ntext',
            'aut_marterno:ntext',
            'aut_correo:ntext',
            //'aut_semestre',
            //'aut_fkcarrera',
            //'aut_fktipo',
            //'aut_fkdepartamento',
            //'aut_fkencargado',
            //'aut_fkuser',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Autor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'aut_id' => $model->aut_id]);
                 }
            ],
        ],
    ]); ?>


</div>
