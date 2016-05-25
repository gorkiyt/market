<?php

namespace frontend\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\admin\models\Market;

/**
 * MarketSearch represents the model behind the search form about `frontend\models\Market`.
 */
class MarketSearch extends Market
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'barkod_no'], 'integer'],
            [['urun_adi', 'urun_kategori'], 'safe'],
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
        $query = Market::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'barkod_no' => $this->barkod_no,
        ]);

        $query->andFilterWhere(['like', 'urun_adi', $this->urun_adi])
            ->andFilterWhere(['like', 'urun_kategori', $this->urun_kategori]);

        return $dataProvider;
    }
}
