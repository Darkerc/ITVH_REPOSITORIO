<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Archivo;

/**
 * ArchivoSearch represents the model behind the search form of `app\models\Archivo`.
 */
class ArchivoSearch extends Archivo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['arc_id', 'arc_visitas', 'arc_descargas'], 'integer'],
            [['arc_nombre', 'arc_extension', 'arc_original', 'arc_mimetype', 'arc_fecha'], 'safe'],
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
        $query = Archivo::find();

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
            'arc_id' => $this->arc_id,
            'arc_visitas' => $this->arc_visitas,
            'arc_descargas' => $this->arc_descargas,
            'arc_fecha' => $this->arc_fecha,
        ]);

        $query->andFilterWhere(['like', 'arc_nombre', $this->arc_nombre])
            ->andFilterWhere(['like', 'arc_extension', $this->arc_extension])
            ->andFilterWhere(['like', 'arc_original', $this->arc_original])
            ->andFilterWhere(['like', 'arc_mimetype', $this->arc_mimetype]);

        return $dataProvider;
    }
}
