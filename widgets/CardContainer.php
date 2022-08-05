<?php

namespace app\widgets;

use yii\base\Widget;

class CardContainer extends Widget
{

    public $title = '';
    public $color = '#17a2b8';

    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        $content = ob_get_clean();
        return $this->render('_cardContainer', compact('content'));
    }
}
