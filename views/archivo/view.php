<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Archivo */

$this->title = $model->arc_id;
$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="archivo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'arc_id' => $model->arc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'arc_id' => $model->arc_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'arc_id',
            'arc_nombre:ntext',
            'arc_extension:ntext',
            'arc_original:ntext',
            'arc_visitas',
            'arc_descargas',
            'arc_mimetype:ntext',
            'arc_fecha',
        ],
    ]) ?>

</div>
