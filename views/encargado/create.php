<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Encargado */

$this->title = 'Create Encargado';
$this->params['breadcrumbs'][] = ['label' => 'Encargados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encargado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
