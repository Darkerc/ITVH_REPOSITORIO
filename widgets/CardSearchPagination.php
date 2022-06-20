<?php

namespace app\widgets;

use yii\base\Widget;

class CardSearchPagination extends Widget
{

    public $title = "Resultados de busqueda";
    public $dataProvider = null;
    public $dataProviderResultsMapper = null;
    public $items = [];
    public $pagination = [
        'pageSize' => 10
    ];

    public function init()
    {
        parent::init();
        $this->dataProvider->setPagination($this->pagination);
        $this->items = array_map($this->dataProviderResultsMapper, $this->dataProvider->getModels());
    }

    public function run()
    {
        return $this->render('_cardSearchPagination');
    }
}
