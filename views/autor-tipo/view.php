<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AutorTipo */

$this->title = $model->autt_id;
$this->params['breadcrumbs'][] = ['label' => 'Autor Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="autor-tipo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'autt_id' => $model->autt_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'autt_id' => $model->autt_id], [
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
            'autt_id',
            'autt_nombre:ntext',
        ],
    ]) ?>

</div>
