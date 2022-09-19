<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioHistorial */

$this->title = $model->usuhis_id;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Historials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuario-historial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'usuhis_id' => $model->usuhis_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'usuhis_id' => $model->usuhis_id], [
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
            'usuhis_id',
            'usuhis_fecha',
            'fk_user',
            'fk_recurso',
        ],
    ]) ?>

</div>
