<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nivel */

$this->title = 'Update Nivel: ' . $model->niv_id;
$this->params['breadcrumbs'][] = ['label' => 'Nivels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->niv_id, 'url' => ['view', 'niv_id' => $model->niv_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nivel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
