<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Palabra */

$this->title = $model->pal_id;
$this->params['breadcrumbs'][] = ['label' => 'Palabras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="palabra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pal_id' => $model->pal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pal_id' => $model->pal_id], [
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
            'pal_id',
            'pal_nombre:ntext',
            'pal_fkrecurso',
        ],
    ]) ?>

</div>
