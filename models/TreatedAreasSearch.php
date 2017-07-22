<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TreatedAreaSearch represents the model behind the search form about `app\models\TreatedArea`.
 */
class TreatedAreasSearch extends TreatedAreas
{

    public $parcelName;
    public $parcelCulture;
    public $tractor;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tractor_id', 'parcel_id', 'area'], 'integer'],
            [['parcelName', 'parcelCulture', 'tractor', 'date', 'updated_at', 'created_at'], 'safe'],
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
        $query = TreatedAreas::find();

        $query->joinWith(['parcel', 'tractor']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['parcelName'] = [
            'asc' => [Parcels::tableName() . '.name' => SORT_ASC],
            'desc' => [Parcels::tableName() . '.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['parcelCulture'] = [
            'asc' => [Parcels::tableName() . '.culture' => SORT_ASC],
            'desc' => [Parcels::tableName() . '.culture' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['tractor'] = [
            'asc' => [Tractors::tableName() . '.name' => SORT_ASC],
            'desc' => [Tractors::tableName() . '.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tractor_id' => $this->tractor_id,
            'parcel_id' => $this->parcel_id,
            'area' => $this->area,
            'date' => $this->date,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            ])
            ->andFilterWhere(['like', Parcels::tableName() . '.name', $this->parcelName])
            ->andFilterWhere(['like', Parcels::tableName() . '.culture', $this->parcelCulture])
            ->andFilterWhere(['like', Tractors::tableName() . '.name', $this->tractor]);

        return $dataProvider;
    }
}
