<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecursoTipo */

$this->title = 'Create Recurso Tipo';
$this->params['breadcrumbs'][] = ['label' => 'Recurso Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-tipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
