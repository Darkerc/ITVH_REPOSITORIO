<?php

namespace app\widgets;

use yii\base\Widget;

class TableViewer extends Widget
{
    public $data = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('_tableViewer');
    }
}
