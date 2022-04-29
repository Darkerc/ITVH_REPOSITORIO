<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Palabra;

/**
 * PalabraSearch represents the model behind the search form of `app\models\Palabra`.
 */
class PalabraSearch extends Palabra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pal_id', 'pal_fkrecurso'], 'integer'],
            [['pal_nombre'], 'safe'],
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
        $query = Palabra::find();

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
            'pal_id' => $this->pal_id,
            'pal_fkrecurso' => $this->pal_fkrecurso,
        ]);

        $query->andFilterWhere(['like', 'pal_nombre', $this->pal_nombre]);

        return $dataProvider;
    }
}
