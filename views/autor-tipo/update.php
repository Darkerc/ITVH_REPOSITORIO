<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AutorTipo */

$this->title = 'Update Autor Tipo: ' . $model->auttip_id;
$this->params['breadcrumbs'][] = ['label' => 'Autor Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->auttip_id, 'url' => ['view', 'auttip_id' => $model->auttip_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="autor-tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
