<?php

use app\models\Autor;
use app\models\Recurso;
use app\widgets\CardListData;
use yii\helpers\Html;
use kartik\dialog\Dialog;
use webvimark\modules\UserManagement\models\User;
use kartik\dialog\DialogAsset;

DialogAsset::register($this);
\yii\web\YiiAsset::register($this);
$recursosRecomendados = Recurso::suggestRecursosByUserId(Yii::$app->user->id);
/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = $model->rec_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-view">
    <?= Dialog::widget([
        'libName' => 'krajeeDialogCust',
        'overrideYiiConfirm' => true,
        'dialogDefaults' => [
            Dialog::DIALOG_CONFIRM => [
                'type' => Dialog::TYPE_PRIMARY,
            ]
        ]
    ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Autor::isAllowedToEdit(Yii::$app->user->identity->id, $model->rec_id)) { ?>
            <?= Html::a('Actualizar', ['update', 'rec_id' => $model->rec_id], ['class' => 'btn btn-primary']) ?>
        <?php } ?>

        <?php if (Autor::isAllowedToEdit(Yii::$app->user->identity->id, $model->rec_id) && $model->rec_status == Recurso::$REC_STATUS_EN_REVICION) { ?>
            <?= Html::button('Autorizar', ['id' => 'recursoAutorizar', 'class' => 'btn btn-warning']) ?>
        <?php } ?>

        <?php if (User::hasRole(['admon', false]) && $model->rec_status == Recurso::$REC_STATUS_EN_REVICION) { ?>
            <?= Html::button('Eliminar', ['id' => 'resourceDelete', 'class' => ['btn btn-danger']]) ?>
        <?php } ?>
    </p>

    <?= $this->render('_card', [
        'model' => $model,
    ]);
    ?>

    <?php if (!is_null($recursosRecomendados) && count($recursosRecomendados) > 0) { ?>
        <?= CardListData::widget([
            'titulo' => Yii::t('app', 'repositorio_listado_recomendados'),
            'descripcion' => Yii::t('app', 'repositorio_listado_recomendados_descripcion'),
            'mode' => 'OUTLINED',
            'data' => $recursosRecomendados,
            'dataResultMapper' => function (Recurso $recurso) {
                return [
                    'href'  => "/recurso/view?rec_id={$recurso->rec_id}",
                    'label' => $recurso->rec_nombre
                ];
            },
        ]) ?>
    <?php } ?>
    <script>
        window.rec_id = "<?= $model->rec_id ?>"
    </script>
    <script src="/js/Recurso/view.js"></script>
</div>