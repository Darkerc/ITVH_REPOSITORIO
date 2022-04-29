<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AutorTipo;

/**
 * AutorTipoSearch represents the model behind the search form of `app\models\AutorTipo`.
 */
class AutorTipoSearch extends AutorTipo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autt_id'], 'integer'],
            [['autt_nombre'], 'safe'],
        ];
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
        $query = AutorTipo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'autt_id' => $this->autt_id,
        ]);

        $query->andFilterWhere(['like', 'autt_nombre', $this->autt_nombre]);

        return $dataProvider;
    }
}
