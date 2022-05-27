<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecursoTipo */

$this->title = $model->rectip_id;
$this->params['breadcrumbs'][] = ['label' => 'Recurso Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recurso-tipo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'rectip_id' => $model->rectip_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rectip_id' => $model->rectip_id], [
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
            'rectip_id',
            'rectip_nombre:ntext',
        ],
    ]) ?>

</div>
