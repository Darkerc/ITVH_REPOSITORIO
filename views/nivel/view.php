<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Nivel */

$this->title = $model->niv_id;
$this->params['breadcrumbs'][] = ['label' => 'Nivels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nivel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'niv_id' => $model->niv_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'niv_id' => $model->niv_id], [
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
            'niv_id',
            'niv_nombre:ntext',
        ],
    ]) ?>

</div>
