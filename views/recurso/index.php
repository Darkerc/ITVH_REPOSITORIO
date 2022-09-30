<?php
use yii\helpers\Html;
use webvimark\modules\UserManagement\models\User;
use app\widgets\CardSearchPagination;
use kartik\select2\Select2;

$this->title = 'Recursos';
$this->params['breadcrumbs'][] = $this->title;

$years = array_combine(range(date("Y"), 2000), range(date("Y"), 2000));
?>
<div class="recurso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex">
            <?php if (User::hasRole(['aut', 'admon', false])) { ?>
                <?= Html::a('Crear un Recurso', ['create'], ['class' => 'btn btn-success mr-3']) ?>
            <?php } ?>

            <?php if (User::hasRole(['admon', false])) { ?>
                <?= Select2::widget([
                    'options' => ['placeholder' => 'Reporte general por año'],
                    'name' => 'año_reporte',
                    'data' => ["all" => 'Todos', ...$years],
                    'pluginEvents' => [
                        "select2:select" => "function(e){ 
                            const year = e.params.data.text
                            window.location.href = '/recurso/recursos-reporte-general?year=' + year;
                        }",
                    ]
                ]) ?>
            <?php } ?>
    </div>

    <?= CardSearchPagination::widget([
        "dataProvider" => $dataProvider,
        'title' => Yii::t('app', 'resultados_busqueda'),
        "dataProviderResultsMapper" => function ($model) {
            return [
                "title" => $model['rec_nombre'],
                "titleChips" => [$model['tipo'], $model['nivel']],
                "description" => $model['rec_resumen'],
                "headerRight" => Yii::t('app', 'publicado_el') . ' ' . date_format(new DateTime($model->rec_registro), 'd/m/Y'),
                "footerRight" => $model['carrera'],
                "footerLeft" => $model['autor'],
                "href" => '/recurso/view?rec_id=' . $model->rec_id . ''
            ];
        }
    ]); ?>



</div>