<?php 
namespace app\widgets;

use yii\base\Widget;

class CardListData extends Widget
{

    public $titulo = '';
    public $descripcion = '';
    public $mode = 'DEFAULT'; # 'DEFAULT' |'OUTLINED' | 'TREE'
    public $list_style_type = 'disc';
    public $data = [];
    public $dataResultMapper = null;

    public function init()
    {
        parent::init();
        $this->data = array_map($this->dataResultMapper, $this->data);
        if ($this->mode != 'TREE') {
            $this->data = [
                [
                    'items' => $this->data
                ]
            ];
        } 
    }

    public function run()
    {
        $titulo = $this->titulo;
        $mode = $this->mode;
        $descripcion = $this->descripcion;
        $list_style_type = $this->list_style_type;
        $data = $this->data;
        return $this->render('_cardListData', compact('titulo', 'descripcion', 'list_style_type','mode', 'data'));
    }
}
