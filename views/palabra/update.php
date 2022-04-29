<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Palabra */

$this->title = 'Update Palabra: ' . $model->pal_id;
$this->params['breadcrumbs'][] = ['label' => 'Palabras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pal_id, 'url' => ['view', 'pal_id' => $model->pal_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="palabra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
