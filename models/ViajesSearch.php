<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Viajes;

/**
 * ViajesSearch represents the model behind the search form about `app\models\Viajes`.
 */
class ViajesSearch extends Viajes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo_viaje', 'plazas', 'destino', 'origen'], 'integer'],
            [['precio'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Viajes::find();

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
            'codigo_viaje' => $this->codigo_viaje,
            'plazas' => $this->plazas,
            'destino' => $this->destino,
            'origen' => $this->origen,
            'precio' => $this->precio,
        ]);

        return $dataProvider;
    }
}
