<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\builder\TabularForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recurso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear un recurso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('publiacion', ['model' => $searchModel]); 
    ?>

    <? /* GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
    ]);  */?>

<?= Html::beginForm();
    TabularForm::widget([
        // your data provider
        'dataProvider' => $dataProvider,

        // set entire form to static only (read only)
        'staticOnly' => true,
        'actionColumn' => false,

        // formName is mandatory for non active forms
        // you can get all attributes in your controller 
        // using $_POST['kvTabForm']
        'formName' => 'kvTabForm',

        // set defaults for rendering your attributes
        'attributeDefaults' => [
            'type' => TabularForm::INPUT_TEXT,
        ],

        // configure attributes to display
        'attributes' => [
            'rec_id' => ['label' => 'ID', 'type' => TabularForm::INPUT_HIDDEN_STATIC],
            'rec_nombre' => ['label' => 'Titulo'],
            'rec_resumen' => [
                'type' => TabularForm::INPUT_RAW,
                'staticValue' => function ($m, $k, $i, $w) {
                    return 'Resumen ' . ($k + 1);
                },
                'value' => function ($m, $k, $i, $w) {
                    return Html::textInput("details", 'Details for book ' . ($k + 1), ['class' => 'form-control']);
                }
            ],
            'rec_registro' => ['label' => 'Publicado el:', 'type' => TabularForm::INPUT_STATIC],
            'tipo' => ['label' => 'Tipo:', 'type' => TabularForm::INPUT_STATIC],
            'nivel' => ['Nivel' => 'Publicado el:', 'type' => TabularForm::INPUT_STATIC],
        ],

        // configure other gridview settings
        'gridSettings' => [
            'panel' => [
                'heading' => '<i class="fas fa-book"></i> Manage Books',
                'before' => false,
                'type' => GridView::TYPE_PRIMARY,
                'before' => false,
                'footer' => false,
                'after' => Html::button('<i class="fas fa-plus"></i> Add New', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create']) . ' ' .
                    Html::button('<i class="fas fa-times"></i> Delete', ['type' => 'button', 'class' => 'btn btn-danger kv-batch-delete']) . ' ' .
                    Html::button('<i class="fas fa-save"></i> Save', ['type' => 'button', 'class' => 'btn btn-primary kv-batch-save'])
            ],
        ]
    ]);
    Html::endForm(); ?>

</div>