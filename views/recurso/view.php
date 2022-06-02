<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Recurso */

$this->title = $model->rec_id;
$this->params['breadcrumbs'][] = ['label' => 'Recursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recurso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'rec_id' => $model->rec_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rec_id' => $model->rec_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo $this->render('_card', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
    ?>

    <div class="row">
        <div class="col col-12 col-md-12 form-group">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'rec_id',
                    'rec_nombre',
                    'rec_resumen',
                    'rec_registro',
                    'rec_descripcion',
                    'rec_fkrecursotipo',
                    'rec_fknivel',
                ],
            ]) ?>
        </div>
    </div>
</div>