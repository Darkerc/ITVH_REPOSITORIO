<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Autor */

$this->title = $model->aut_id;
$this->params['breadcrumbs'][] = ['label' => 'Autors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="autor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'aut_id' => $model->aut_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'aut_id' => $model->aut_id], [
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
            'aut_id',
            'aut_nombre:ntext',
            'aut_paterno:ntext',
            'aut_materno:ntext',
            'aut_correo:ntext',
            'aut_semestre',
            'aut_fkcarrera',
            'aut_fkautortipo',
            'aut_fkdepartamento',
            'aut_fkuser',
        ],
    ]) ?>

</div>
