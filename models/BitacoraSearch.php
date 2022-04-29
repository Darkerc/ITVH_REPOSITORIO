<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bitacora;

/**
 * BitacoraSearch represents the model behind the search form of `app\models\Bitacora`.
 */
class BitacoraSearch extends Bitacora
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bit_id', 'bit_fkrecurso'], 'integer'],
            [['bit_descripcion'], 'safe'],
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
        $query = Bitacora::find();

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
            'bit_id' => $this->bit_id,
            'bit_fkrecurso' => $this->bit_fkrecurso,
        ]);

        $query->andFilterWhere(['like', 'bit_descripcion', $this->bit_descripcion]);

        return $dataProvider;
    }
}
