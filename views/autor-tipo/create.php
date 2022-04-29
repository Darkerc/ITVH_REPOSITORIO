<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AutorTipo */

$this->title = 'Create Autor Tipo';
$this->params['breadcrumbs'][] = ['label' => 'Autor Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autor-tipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
