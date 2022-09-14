<?php

namespace app\widgets;

use yii\base\Widget;

class RecursoDublinCoreModal extends Widget
{
    public $model = null;
    public $type = '';
    public $content = '';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('_recursoDublinCoreModal');
    }
}
