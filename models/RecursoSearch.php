<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Recurso;

/**
 * RecursoSearch represents the model behind the search form of `app\models\Recurso`.
 */
class RecursoSearch extends Recurso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rec_id', 'rec_fkrecursotipo', 'rec_fknivel'], 'integer'],
            [['rec_nombre', 'rec_resumen', 'rec_registro', 'rec_descripcion'], 'safe'],
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
        $query = Recurso::find();

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
            'rec_id' => $this->rec_id,
            'rec_registro' => $this->rec_registro,
            'rec_fkrecursotipo' => $this->rec_fkrecursotipo,
            'rec_fknivel' => $this->rec_fknivel,
        ]);

        $query->andFilterWhere(['like', 'rec_nombre', $this->rec_nombre])
            ->andFilterWhere(['like', 'rec_resumen', $this->rec_resumen])
            ->andFilterWhere(['like', 'rec_descripcion', $this->rec_descripcion]);


        return $dataProvider;
    }
}
