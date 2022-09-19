<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioHistorial */

$this->title = 'Update Usuario Historial: ' . $model->usuhis_id;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Historials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usuhis_id, 'url' => ['view', 'usuhis_id' => $model->usuhis_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-historial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
