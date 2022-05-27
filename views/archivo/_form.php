<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Archivo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'arc_nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'arc_extension')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'arc_original')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'arc_visitas')->textInput() ?>

    <?= $form->field($model, 'arc_descargas')->textInput() ?>

    <?= $form->field($model, 'arc_mimetype')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'arc_fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
