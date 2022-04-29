<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Encargado */

$this->title = 'Update Encargado: ' . $model->enc_id;
$this->params['breadcrumbs'][] = ['label' => 'Encargados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->enc_id, 'url' => ['view', 'enc_id' => $model->enc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encargado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
