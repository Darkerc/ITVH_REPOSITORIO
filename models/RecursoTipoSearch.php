<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecursoTipo;

/**
 * RecursoTipoSearch represents the model behind the search form of `app\models\RecursoTipo`.
 */
class RecursoTipoSearch extends RecursoTipo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rectip_id'], 'integer'],
            [['rectip_nombre'], 'safe'],
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
        $query = RecursoTipo::find();

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
            'rectip_id' => $this->rectip_id,
        ]);

        $query->andFilterWhere(['like', 'rectip_nombre', $this->rectip_nombre]);

        return $dataProvider;
    }
}
