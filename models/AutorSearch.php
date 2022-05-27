<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autor;

/**
 * AutorSearch represents the model behind the search form of `app\models\Autor`.
 */
class AutorSearch extends Autor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aut_id', 'aut_semestre', 'aut_fkcarrera', 'aut_fkautortipo', 'aut_fkdepartamento', 'aut_fkuser'], 'integer'],
            [['aut_nombre', 'aut_paterno', 'aut_materno', 'aut_correo'], 'safe'],
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
        $query = Autor::find();

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
            'aut_id' => $this->aut_id,
            'aut_semestre' => $this->aut_semestre,
            'aut_fkcarrera' => $this->aut_fkcarrera,
            'aut_fkautortipo' => $this->aut_fkautortipo,
            'aut_fkdepartamento' => $this->aut_fkdepartamento,
            'aut_fkuser' => $this->aut_fkuser,
        ]);

        $query->andFilterWhere(['like', 'aut_nombre', $this->aut_nombre])
            ->andFilterWhere(['like', 'aut_paterno', $this->aut_paterno])
            ->andFilterWhere(['like', 'aut_materno', $this->aut_materno])
            ->andFilterWhere(['like', 'aut_correo', $this->aut_correo]);

        return $dataProvider;
    }
}
