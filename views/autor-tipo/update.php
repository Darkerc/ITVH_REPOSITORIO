<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AutorTipo */

$this->title = 'Update Autor Tipo: ' . $model->autt_id;
$this->params['breadcrumbs'][] = ['label' => 'Autor Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->autt_id, 'url' => ['view', 'autt_id' => $model->autt_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="autor-tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
