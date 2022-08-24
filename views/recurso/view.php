<?php

use app\models\Autor;
use yii\helpers\Html;
use kartik\dialog\Dialog;
use webvimark\modules\UserManagement\models\User;
use kartik\dialog\DialogAsset;

DialogAsset::register($this);
\yii\web\YiiAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = $model->rec_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-view">
    <?= Dialog::widget([
        'libName' => 'krajeeDialogCust',
        'overrideYiiConfirm' => false,
        'dialogDefaults' => [
            Dialog::DIALOG_CONFIRM => [
                'type' => DIALOG::TYPE_DANGER
            ]
        ] 
    ]) ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Autor::isAllowedToEdit(Yii::$app->user->identity->id, $model->rec_id)) { ?>
            <?= Html::a('Actualizar', ['update', 'rec_id' => $model->rec_id], ['class' => 'btn btn-primary']) ?>
        <?php } ?>

        <?php if (User::hasRole(['admon', false])) { ?>
            <?= Html::button('Eliminar', ['id' => 'resourceDelete', 'class' => ['btn btn-danger']]) ?>
        <?php } ?>
    </p>

    <?= $this->render('_card', [
        'model' => $model,
    ]);
    ?>
    <script>
        window.rec_id = "<?= $model->rec_id ?>"
    </script>
    <script src="/js/Recurso/view.js"></script>
</div>