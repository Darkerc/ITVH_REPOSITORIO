<?php

use app\models\UsuarioDublinCore;
use app\widgets\CardSearchPagination;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioHistorial */

// $this->title = $model->usuhis_id;
// $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'historial_busqueda'), 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuario-historial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= CardSearchPagination::widget([
        "dataProvider" => $dataProvider,
        'title' => 'Solicitudes para archivos Dublin Core',
        "dataProviderResultsMapper" => function (UsuarioDublinCore $model) {
            return [
                "title" => $model->usudcFkuser->username,
                "titleChips" => [],
                "description" => "Recurso solicitdado: " . $model->usudcFkrecurso->rec_nombre,
                "headerRight" => 'Fecha de solicitud' . ' ' . date_format(new DateTime($model->usudc_fecha), 'd/m/Y'),
                "footerRight" => $model->usudc_autorizado == UsuarioDublinCore::$AUTORIZADO ? 'Autorizado' : '',
                "href" => '/recurso/view?rec_id=' . $model->usudcFkrecurso->rec_id . '',
                "optionsSlot" => $model->usudc_autorizado  == UsuarioDublinCore::$SIN_DETERMINAR ? Html::a('Aceptar solicitud', ['recurso/dc-authorize', 'rec_id' => $model->usudc_fkrecurso, 'user_id' => $model->usudc_fkuser, 'state' => 1], ['class' => 'btn btn-info m-1']) : '' .
                                 Html::a($model->usudc_autorizado  == UsuarioDublinCore::$SIN_DETERMINAR ? 'Rechazar solicitud' : 'Revocar acceso', ['recurso/dc-authorize', 'rec_id' => $model->usudc_fkrecurso, 'user_id' => $model->usudc_fkuser, 'state' => -1], ['class' => 'btn btn-danger m-1'])
            ];
        }
    ]); ?>

</div>