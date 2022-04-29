<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Palabra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="palabra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pal_nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pal_fkrecurso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
