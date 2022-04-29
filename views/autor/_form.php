<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Autor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'aut_nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'aut_apellidoMaterno')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'aut_apellidoPaterno')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'aut_correo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'aut_semestre')->textInput() ?>

    <?= $form->field($model, 'aut_fkcarrera')->textInput() ?>

    <?= $form->field($model, 'aut_fktipo')->textInput() ?>

    <?= $form->field($model, 'aut_fkdepartamento')->textInput() ?>

    <?= $form->field($model, 'aut_fkencargado')->textInput() ?>

    <?= $form->field($model, 'aut_fkuser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
