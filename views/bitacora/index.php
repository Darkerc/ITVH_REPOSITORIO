<?php

use app\widgets\TableViewer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BitacoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bitácora';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacora-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'bit_id',
            [
                'format' => 'html',
                'contentOptions' => ['style' => 'min-width:600px;'],
                'value' => function ($data) {
                    $bit_descripcion_data = json_decode($data->bit_descripcion, true);
                    return TableViewer::widget([
                        'data' => array_map(
                            fn ($key, $val) => ['header' => $key, 'values' => is_array($val) ? join(' - ', $val) : $val], 
                            array_keys($bit_descripcion_data), 
                            array_values($bit_descripcion_data)
                        )
                    ]);
                },
            ],
            'bit_fkrecurso',
        ],
    ]); ?>

</div>