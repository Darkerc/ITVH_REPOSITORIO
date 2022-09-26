<?php

use app\widgets\CardSearchPagination;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioHistorial */

$this->title = $model->usuhis_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'historial_busqueda'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuario-historial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= CardSearchPagination::widget([
        "dataProvider" => $dataProvider,
        'title' => Yii::t('app', 'historial_busqueda'),
        "dataProviderResultsMapper" => function ($model) {
            return [
                "title" => $model->recurso->rec_nombre,
                "titleChips" => [$model->recurso->tipo, $model->recurso->nivel],
                "description" => $model->recurso->rec_resumen,
                "headerRight" => Yii::t('app', 'visitado_el') . ' ' . date_format(new DateTime($model->usuhis_fecha), 'd/m/Y'),
                "footerRight" => $model->recurso->carrera,
                "footerLeft" => $model->recurso->autor,
                "href" => '/recurso/view?rec_id=' . $model->recurso->rec_id,
                "dangerBtn" => [
                    'values' => [
                        'usuhis_id' => $model->usuhis_id
                    ],
                    'text' => 'Eliminar',
                    'href' => '/usuario-historial/delete?usuhis_id=' . $model->usuhis_id
                ]
            ];
        }
    ]); ?>

</div>
