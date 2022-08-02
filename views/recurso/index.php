<?php

use app\models\Carrera;
use app\models\Nivel;
use app\models\Palabra;
use app\models\RecursoTipo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;
use app\widgets\CardSearchPagination;
use kartik\label\LabelInPlace;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (User::hasRole(['aut', 'admon', false])) { ?>
            <?= Html::a('Crear un Recurso', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="jumbotron p-3">
        <?= Html::tag('h3', 'Filtros') ?>
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]) ?>

        <?= $form->field($searchModel, 'rec_nombre')->widget(LabelInPlace::classname(), [
            'label' => 'Titulo',
            'encodeLabel' => false,
        ]); ?>

        <?= $form->field($searchModel, 'rec_resumen')->widget(LabelInPlace::classname(), [
            'type' => LabelInPlace::TYPE_TEXTAREA,
            'label' => 'Resumen',
            'encodeLabel' => false,
            'options' => ['rows' => 4],
        ]); ?>

        <div class="row">
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($searchModel, 'rec_fkrecursotipo')->widget(Select2::classname(), [
                    'data' => RecursoTipo::map(),
                    'options' => [
                        'placeholder' => 'Seleccione un tipo',
                    ],
                ])->label('Tipo'); ?>
            </div>
            <div class="col col-12 col-md-6 form-group">
                <?= $form->field($searchModel, 'rec_fknivel')->widget(Select2::classname(), [
                    'data' => Nivel::map(),
                    'options' => [
                        'placeholder' => 'Seleccione un nivel',
                    ],
                ])->label('Nivel'); ?>
            </div>
        </div>

        <?= $form->field($searchModel, 'recursoCarrera')->widget(Select2::classname(), [
            'data' => Carrera::map(),
            'options' => ['placeholder' => 'Selecciona una carrera...', 'multiple' => true],
            'toggleAllSettings' => [
                'selectLabel' => '-Selecionar todo',
                'unselectLabel' => 'Deseleccionar todo',
                'selectOptions' => ['class' => 'text-success'],
                'unselectOptions' => ['class' => 'text-danger'],
            ],
            'pluginOptions' => [
                'tags' => true,
                'tokenSeparators' => [',', ' '],
                'maximumInputLength' => 20
            ],
        ])->label('Carreras'); ?>

        <?= $form->field($searchModel, 'palabrasc')->widget(Select2::classname(), [
            'data' => Palabra::map(),
            'options' => ['placeholder' => 'Ingrese las palabras clave...', 'multiple' => true],
            'toggleAllSettings' => [
                'selectLabel' => 'Seleccionar todo',
                'unselectLabel' => 'Deseleccionar todo',
                'selectOptions' => ['class' => 'text-success'],
                'unselectOptions' => ['class' => 'text-danger'],
            ],
            'pluginOptions' => [
                'tags' => true,
                'tokenSeparators' => [',', ' '],
                'maximumInputLength' => 15
            ],
        ])->label('Palabras Clave');  ?>

        <div class="form-group">
            <div class="col-12 col-md-4 offset-md-8">
                <?= Html::submitButton('Buscar...', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end() ?>

        <!-- <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'id' => 'recursos', 
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'rec_id',
                'rec_nombre:ntext',
                'rec_resumen:ntext',
                'rec_registro',
                //'rec_descripcion:ntext',
                'tipo',
                'nivel',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'rec_id' => $model->rec_id]);
                    }
                ],
            ],
        ]);  ?> -->
    </div>

    <?= CardSearchPagination::widget([
        "dataProvider" => $dataProvider,
        "dataProviderResultsMapper" => function ($model) {
            return [
                "title" => $model['rec_nombre'],
                "titleChip" => $model['tipo'],
                "description" => $model['rec_resumen'],
                "headerRight" => "Publicado en: " . date_format(new DateTime($model['rec_registro']), 'd/m/Y'),
                "footerRight" => $model['carrera'],
                "footerLeft" => $model['autor'],
                "href" => '/recurso/view?rec_id=' . $model->rec_id . ''
            ];
        }
    ]); ?>



</div>