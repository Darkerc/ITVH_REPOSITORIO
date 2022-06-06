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
        'pageSize' => 10,
    ];

    public function init()
    {
        parent::init();
        $this->dataProvider->setPagination($this->pagination);
        $this->dataProvider->pagination->setPage($this->currentPage());
        $this->items = array_map($this->dataProviderResultsMapper, $this->dataProvider->getModels());
    }

    public function currentPage()
    {
        return $_GET['page'] - 1;
    }

    public function changePage($index) {
        return $this->addParamsToUrl(['page' => $index]);
    }

    public function addParamsToUrl($params)
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $q);
        foreach ( $params as $k => $v ) $q[$k] = $v;
        $new_url = $url['path'] . '?' . http_build_query($q);
        return $new_url;
    }

    public function run()
    {
        return $this->render('_cardSearchPagination');
    }
}
