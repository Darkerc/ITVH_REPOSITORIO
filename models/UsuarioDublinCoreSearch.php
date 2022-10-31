<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * RecursoSearch represents the model behind the search form of `app\models\Recurso`.
 */

class UsuarioDublinCoreSearch extends UsuarioDublinCore
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UsuarioDublinCore::find()->orderBy(['usudc_fecha'=>SORT_DESC]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        return $dataProvider;
    }
}
