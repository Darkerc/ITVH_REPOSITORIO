<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Archivo */

$this->title = 'Update Archivo: ' . $model->arc_id;
$this->params['breadcrumbs'][] = ['label' => 'Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->arc_id, 'url' => ['view', 'arc_id' => $model->arc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="archivo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
