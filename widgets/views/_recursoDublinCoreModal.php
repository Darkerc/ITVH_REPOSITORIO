<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
?>

<?php Modal::begin([
    'title' => $this->context->model->rec_nombre, 
    'toggleButton' => ['label' => "Descargar {$this->context->type} <img src='/images/download.svg' />", 'class' => 'mx-3 kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary'], 
    'size' => Modal::SIZE_EXTRA_LARGE]); 
?>
<div class="d-flex justify-content-end">
    <?= Html::a("Descargar {$this->context->type} <img src='/images/download.svg' />", "/recurso/download-dublin-file?type=json&rec_id={$this->context->model->rec_id}", ['title' => "Descargar {$this->context->type}", 'class' => 'mx-3 kv-file-download btn btn-sm btn-kv btn-default btn-outline-secondary']) ?>
</div>
<pre>
    <code class="language-<?= $this->context->type ?>">
<?= $this->context->content ?>
    </code>
</pre>
<?php Modal::end(); ?>