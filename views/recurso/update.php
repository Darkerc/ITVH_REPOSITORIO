<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = 'Actualizando: ' . $model->rec_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rec_nombre, 'url' => ['view', 'rec_id' => $model->rec_id]];
$this->params['breadcrumbs'][] = 'Actualizando';
?>
<div class="recurso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
