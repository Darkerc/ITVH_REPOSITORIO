<?php

use app\models\Carrera;
use app\models\Nivel;
use app\models\RecursoTipo;
use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use kartik\label\LabelInPlace;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
// on your view layout file
use kartik\icons\FontAwesomeAsset;
use kartik\select2\Select2;
use webvimark\modules\UserManagement\models\User;
use kartik\file\FileInput;

FontAwesomeAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */
/* @var $form yii\widgets\ActiveForm */

$config = ['template' => "{input}\n{error}\n{hint}"];
$tipo = ArrayHelper::map(RecursoTipo::find()->all(), 'rectip_id', 'rectip_nombre');
$nivel = ArrayHelper::map(Nivel::find()->all(), 'niv_id', 'niv_nombre');
$carrera = ArrayHelper::map(Carrera::find()->all(), 'car_id', 'car_nombre');
?>

<?php if (User::hasRole(['admon', false])) { ?>

    <?= $this->render('_form/_formadmon', [
        'model' => $model,
    ]); ?>

<?php } else if (User::hasRole(['aut', false])) { ?>

    <?= $this->render('_form/_formaut', [
        'model' => $model,
    ]); ?>

<?php } ?>