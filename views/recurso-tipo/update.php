<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecursoTipo */

$this->title = 'Update Recurso Tipo: ' . $model->rectip_id;
$this->params['breadcrumbs'][] = ['label' => 'Recurso Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rectip_id, 'url' => ['view', 'rectip_id' => $model->rectip_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recurso-tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
