<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;
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
        <?php if (User::hasRole(['aut', 'admon', false])) { ?>
            <?= Html::a('Crear un Recurso', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= CardSearchPagination::widget([
        "dataProvider" => $dataProvider,
        "dataProviderResultsMapper" => function ($model) {
            return [
                "title" => $model['rec_nombre'],
                "titleChip" => $model['tipo'],
                "description" => $model['rec_resumen'],
                "headerRight" => "Publicado en: " . date_format(new DateTime($model['rec_registro']), 'd/m/Y'),
                "footerRight" => $model['carrera'],
                "footerLeft" => $model['autor'],
                "href" => '/recurso/view?rec_id=' . $model->rec_id . ''
            ];
        }
    ]); ?>

    <?php if (User::hasRole(['admon', false])) { ?>
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
    <?php } ?>

</div>