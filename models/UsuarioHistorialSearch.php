<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioHistorial;

/**
 * UsuarioHistorialSearch represents the model behind the search form of `app\models\UsuarioHistorial`.
 */
class UsuarioHistorialSearch extends UsuarioHistorial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuhis_id', 'fk_user', 'fk_recurso'], 'integer'],
            [['usuhis_fecha'], 'safe'],
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
        $query = UsuarioHistorial::find();

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
            'usuhis_id' => $this->usuhis_id,
            'usuhis_fecha' => $this->usuhis_fecha,
            'fk_user' => $this->fk_user,
            'fk_recurso' => $this->fk_recurso,
        ]);

        return $dataProvider;
    }
}
