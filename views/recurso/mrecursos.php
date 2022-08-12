<?php

use yii\helpers\Html;
use app\widgets\CardSearchPagination;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mis Recursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear un Recurso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= CardSearchPagination::widget([
        "dataProvider" => $dataProvider,
        'title' => 'Resultados de la búsqueda de "Mis Recursos"',
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



</div>